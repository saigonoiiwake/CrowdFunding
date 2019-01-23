<?php

use Illuminate\Database\Seeder;
use App\ProjectUpdate;

class ProjectUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('project_update')->insert([
            'project_id'       => 1,
            'title'            => 'fefweew wfefewfwe fwefwefwef',
            'content'          => 'fefweew wfefewfwe fwefwefwef',
            'created_at'       => now(),
            'updated_at'       => now()
        ]);
    }
}
