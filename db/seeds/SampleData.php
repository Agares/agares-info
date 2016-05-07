<?php

use Phinx\Seed\AbstractSeed;

class SampleData extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $this->table('posts')
            ->insert([
	            [
		            'slug' => 'test-post-01',
		            'title' => 'Test post 01',
		            'version' => 1,
		            'published_date' => time()-(9*86400),
		            'content' => '<b>Blah</b> blah blah'
                ],
	            [
		            'slug' => 'test-post-02',
		            'title' => 'Test post 02',
		            'version' => 1,
		            'published_date' => time()-(6*86400),
		            'content' => '<b>Blah blah</b> blah'
	            ],
	            [
		            'slug' => 'test-post-01',
		            'title' => 'Test post 01 v2',
		            'version' => 2,
		            'published_date' => time()-(4*86400),
		            'content' => 'Blah <b>blah blah</b>'
	            ]
            ])
            ->save();
    }
}
