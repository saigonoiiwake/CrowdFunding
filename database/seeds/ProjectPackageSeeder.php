<?php

use Illuminate\Database\Seeder;

class ProjectPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProjectPackage::class, 7)->create();
    }
}
