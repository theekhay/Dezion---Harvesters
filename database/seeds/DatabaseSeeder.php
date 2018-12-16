<?php

use Illuminate\Database\Seeder;
use App\Models\MemberDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ChurchTableSeeder::class,
            BranchMemberTypeTableSeeder::class,
            ChurchMemberTypeTableSeeder::class,
        ]);
    }
}
