<?php

use Illuminate\Database\Seeder;

class ChurchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Church::class, 8)->create()->each(function ($church) {
           $church->branches()->save( factory(App\Models\Branch::class)->make() );
        });
    }
}
