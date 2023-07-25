<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            ['username' => '古内一郎', 'mail' => 'furuuchi01@atlas.com', 'password' => bcrypt('01f')],
            ['username' => '古内二郎', 'mail' => 'furuuchi02@atlas.com', 'password' => bcrypt('02f')],
            ['username' => '古内三郎', 'mail' => 'furuuchi03@atlas.com', 'password' => bcrypt('03f')],
            ['username' => '古内四郎', 'mail' => 'furuuchi04@atlas.com', 'password' => bcrypt('04f')],
            ['username' => '古内五郎', 'mail' => 'furuuchi05@atlas.com', 'password' => bcrypt('05f')]
        ]);
    }
}