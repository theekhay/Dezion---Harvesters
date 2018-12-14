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

            //this creates a random amount of branches for each church

            $rand_branch_count = random_int(1, 7);
            for ($i=1; $i < $rand_branch_count; $i++ )
            {
                $church->getBranches()->save( factory(App\Models\Branch::class)->make(['church_id' => $church->id]) );
            }
        });
    }
}
