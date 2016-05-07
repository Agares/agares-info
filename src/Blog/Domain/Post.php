<?php

namespace Agares\Blog\Domain;

class Post
{
	/**
	 * @var \DateTime
	 */
	private $publishedDate;

	/**
	 * @var string
	 */
	private $slug;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $content;

	/**
	 * @var int
	 */
	private $version;

	public function __construct(\DateTime $publishedDate, int $version, string $slug, string $title, string $content)
	{
		$this->publishedDate = $publishedDate;
		$this->version = $version;
		$this->slug = $slug;
		$this->title = $title;
		$this->content = $content;
	}

	public function getPublishedDate() : \DateTime
	{
		return $this->publishedDate;
	}

	public function getSlug() : string
	{
		return $this->slug;
	}

	public function getTitle() : string
	{
		return $this->title;
	}

	public function getContent() : string
	{
		return $this->content;
	}

	public function getVersion() : int
	{
		return $this->version;
	}
}