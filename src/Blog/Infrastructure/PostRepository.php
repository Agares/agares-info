<?php

namespace Agares\Blog\Infrastructure;

use Agares\Blog\Domain\Post;
use Agares\Blog\Domain\PostRepositoryInterface;
use Agares\Blog\Exceptions\PostNotFoundException;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Don't do this at homo, children!
 */
class PostRepository implements PostRepositoryInterface
{
	/**
	 * @return Post[]
	 */
	public function findAll() : array
	{
		$posts = [];

		$globIterator = new \GlobIterator(__DIR__.'/../../../posts/*.json');
		foreach($globIterator as $postFileInfo) {
			/** @var SplFileInfo $postFileInfo */
			$postFile = $postFileInfo->openFile();
			$postContents = $postFile->fread($postFile->getSize());
			$raw = json_decode($postContents, true);

			$posts[] = new Post($raw['published'], $raw['version'], $raw['slug'], $raw['title'], $raw['html']);
		}

		usort($posts, function(Post $a, Post $b) { return $b <=> $a; });

		return $posts;
	}

	public function findNewestVersionBySlug(string $slug) : Post
	{
		$allPosts = $this->findAll();

		foreach($allPosts as $post) {
			if($post->getSlug() === $slug) {
				return $post;
			}
		}

		throw new PostNotFoundException();
	}
}