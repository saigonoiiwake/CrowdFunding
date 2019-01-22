<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectCommentSeeder::class);
        $this->call(ProjectCommentReplySeeder::class);
        $this->call(ProjectCategorySeeder::class);
        $this->call(ProjectOwnerSeeder::class);
        $this->call(ProjectPackageSeeder::class);
        $this->call(ProjectUpdateSeeder::class);
    }
}
