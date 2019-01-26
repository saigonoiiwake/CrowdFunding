<?php

use Illuminate\Database\Seeder;

class ProjectCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProjectComment::class, 3)->create();
    }
}
