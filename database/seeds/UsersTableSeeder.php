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
            ['username' => '古内一郎', 'mail' => 'furuuchi01@atlas.com', 'password' => bcrypt('01f'), 'images' => 'icon1.png'],
            ['username' => '古内二郎', 'mail' => 'furuuchi02@atlas.com', 'password' => bcrypt('02f'), 'images' => 'icon2.png'],
            ['username' => '古内三郎', 'mail' => 'furuuchi03@atlas.com', 'password' => bcrypt('03f'), 'images' => 'icon3.png'],
            ['username' => '古内四郎', 'mail' => 'furuuchi04@atlas.com', 'password' => bcrypt('04f'), 'images' => 'icon4.png'],
            ['username' => '古内五郎', 'mail' => 'furuuchi05@atlas.com', 'password' => bcrypt('05f'), 'images' => 'icon5.png'],
        ]);
    }
}
