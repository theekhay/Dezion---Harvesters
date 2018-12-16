<?php

use Illuminate\Database\Seeder;

class MemberDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MemberDetail::class)->create();
    }
}
