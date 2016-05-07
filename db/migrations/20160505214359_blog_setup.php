<?php

use Phinx\Migration\AbstractMigration;

class BlogSetup extends AbstractMigration
{
    public function change()
    {   
        $this
            ->table('posts', ['id' => false, 'primary_key' => ['slug', 'version']])
	        ->addColumn('slug', 'string', ['limit' => 255])
	        ->addColumn('version', 'integer')
	        ->addColumn('title', 'string', ['limit' => 255])
	        ->addColumn('content', 'string')
	        ->addColumn('published_date', 'integer')
	        ->create();
    }
}
