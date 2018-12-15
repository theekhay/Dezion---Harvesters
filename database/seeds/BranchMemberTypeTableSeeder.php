<?php

use Illuminate\Database\Seeder;

class BranchMemberTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //BranchMemberType
        factory(App\Models\BranchMemberType::class, 3)->create();
    }
}
