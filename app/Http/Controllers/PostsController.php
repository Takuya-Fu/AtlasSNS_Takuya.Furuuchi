<?php

namespace App\Http\Controllers;

class PostsController extends Controller
/*　投稿された時のコントローラー　*/
    // public function show()
    // {
    //     // フォローしているユーザーのid取得→$following_idで取得する。
    //     $following_id = Auth::user()->follows()->pluck('①');
    //     // フォローしているユーザーのIDを基に投稿内容を取得→pluckは今回取得したい情報のカラム名の事
    //     $posts = Post::with('user')->whereIn('②', $following_id)->get();
    //     return view('yyyy', compact('posts'));
    //     // $postsにデータを引き継ぐ
    // }
    {
        // 一覧表示
        public function index(Tweet $tweet, Follower $follower)
        {
            $user = auth()->user();
            $follow_ids = $follower->followingIds($user->id);
            // followed_idだけ抜き出す
            $following_ids = $follow_ids->pluck('followed_id')->toArray();
    
            $timelines = $tweet->getTimelines($user->id, $following_ids);
    
            return view('tweets.index', [
                'user'      => $user,
                'timelines' => $timelines
            ]);
        }
    
        // 新規ツイート入力画面
        public function create()
        {
            $user = auth()->user();
    
            return view('tweets.create', [
                'user' => $user
            ]);
        }
    
    
        // 新規ツイート投稿処理
        public function store(Request $request, Tweet $tweet)
        {
            $user = auth()->user();
            $data = $request->all();
            $validator = Validator::make($data, [
                'text' => ['required', 'string', 'max:140']
            ]);
    
            $validator->validate();
            $tweet->tweetStore($user->id, $data);
    
            return redirect('tweets');
        }
    
        // ツイート詳細画面
        public function show(Tweet $tweet, Comment $comment)
        {
            $user = auth()->user();
            $tweet = $tweet->getTweet($tweet->id);
            $comments = $comment->getComments($tweet->id);
    
            return view('tweets.show', [
                'user'     => $user,
                'tweet' => $tweet,
                'comments' => $comments
            ]);
        }
    
    
        // ツイート編集画面
        public function edit($id)
        {
            //
        }
    
        // ツイート編集処理
        public function update(Request $request, $id)
        {
            //
        }
    
        // ツイート削除処理
        public function destroy($id)
        {
            //
        }
    
}
