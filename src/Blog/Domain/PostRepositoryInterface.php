<?php

namespace Agares\Blog\Domain;

interface PostRepositoryInterface
{
	/**
	 * @return Post[]
	 */
	public function findAll() : array;

	public function findNewestVersionBySlug(string $slug) : Post;
}