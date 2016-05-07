<?php

namespace Agares\Blog\Infrastructure;

use Agares\Blog\Domain\Post;
use Agares\Blog\Domain\PostRepositoryInterface;
use Agares\MicroORM\EntityDefinition;
use Agares\MicroORM\EntityDefinitionCreator;
use Agares\MicroORM\EntityDefinitionCreatorInterface;
use Agares\MicroORM\QueryAdapter;

class DbPostRepository implements PostRepositoryInterface
{
	/**
	 * @var QueryAdapter
	 */
	private $queryAdapter;

	/**
	 * @var EntityDefinition
	 */
	private $postDefinition;

	public function __construct(QueryAdapter $queryAdapter, EntityDefinitionCreatorInterface $entityDefinitionCreator)
	{
		$this->queryAdapter = $queryAdapter;
		$this->postDefinition = $entityDefinitionCreator->create(Post::class);
	}

	/**
	 * @return Post[]
	 */
	public function findAll() : array
	{
		$query = <<<EOT
		WITH all_posts AS (
			SELECT 
				slug, 
				version, 
				published_date, 
				title, 
				content,
				ROW_NUMBER() OVER (PARTITION BY slug ORDER BY version DESC) AS "rn"
			FROM 
				"posts" "p"
		)
		SELECT 
			* 
		FROM 
			all_posts 
		WHERE 
			"rn" = 1
		ORDER BY 
			published_date DESC
EOT;

		return $this->queryAdapter->executeQuery($query, $this->postDefinition);
	}

	public function findNewestVersionBySlug(string $slug) : Post
	{
		return $this->queryAdapter->executeQuery('SELECT slug, version, published_date, title, content FROM "posts" ORDER BY version DESC LIMIT 1', $this->postDefinition)[0];
	}
}