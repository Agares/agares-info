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
	 * @var integer
	 */
	private $version;

	/**
	 * @param \DateTime $publishedDate
	 * @param $version
	 * @param string $slug
	 * @param string $title
	 * @param string $content
	 */
	public function __construct($publishedDate, $version, $slug, $title, $content)
	{
		$this->publishedDate = $publishedDate;
		$this->version = $version;
		$this->slug = $slug;
		$this->title = $title;
		$this->content = $content;
	}

	/**
	 * @return \DateTime
	 */
	public function getPublishedDate()
	{
		return $this->publishedDate;
	}

	/**
	 * @return string
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @return integer
	 */
	public function getVersion()
	{
		return $this->version;
	}
}