<?php

use Illuminate\Database\Seeder;

class ChurchMemberTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ChurchMemberType::class, 5)->create();
    }
}
