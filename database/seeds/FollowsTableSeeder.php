<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // 最初のフォロー・フォロワーされている人を入力する 
    public function run()
    {
        $following_data = [
            ['user_id' => 1,'following_id' => 3], //一郎さん(ID:1)は三郎さん(ID:3をフォローしている)
            ['user_id' => 2,'following_id' => 3], //二郎さん(ID:2)は三郎さん(ID:3をフォローしている)
            ['user_id' => 3,'following_id' => 5], //三郎さん(ID:3)は五郎さん(ID:5をフォローしている)
        ];

        foreach($following_data as $following_values){

            $following = new \App\Follow();
            $following->user_id = $following_values['user_id'];
            $following->following_user_id = $following_values['following_user_id'];
            $following->save();
            
        }
        
    }
}
