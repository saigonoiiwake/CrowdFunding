<?php

use Illuminate\Database\Seeder;

class ProjectCommentReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProjectCommentReply::class, 10)->create();
    }
}
