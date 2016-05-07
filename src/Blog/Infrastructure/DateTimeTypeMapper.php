<?php

namespace Agares\Blog\Infrastructure;

use Agares\MicroORM\TypeMapperInterface;

class DateTimeTypeMapper implements TypeMapperInterface
{
	/**
	 * Get value of entity field $fieldName, based on list of all $fields that were passed to mapper
	 *
	 * @param string $fieldName
	 * @param array $fields
	 *
	 * @return mixed
	 */
	public function fromString(string $fieldName, array $fields)
	{
		return \DateTime::createFromFormat('U', $fields[$fieldName]);
	}
}