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
            ['username' => '古内五郎', 'mail' => 'furuuchi05@atlas.com', 'password' => bcrypt('05f')],
            ['username' => '古内六郎', 'mail' => 'furuuchi06@atlas.com', 'password' => bcrypt('06f')],
            ['username' => '古内七郎', 'mail' => 'furuuchi07@atlas.com', 'password' => bcrypt('07f')],
            ['username' => '古内八郎', 'mail' => 'furuuchi08@atlas.com', 'password' => bcrypt('08f')],
            ['username' => '古内九郎', 'mail' => 'furuuchi09@atlas.com', 'password' => bcrypt('09f')],
        ]);
    }
}

// ユーザー検索時に引用したいデータ（migration→users_table内のカラム）
// images→アイコン画像　username→ユーザー名
// フォロー解除ボタンとフォローするボタン
// 並びとしては「アイコン画像・名前・フォローorフォロー解除ボタン」