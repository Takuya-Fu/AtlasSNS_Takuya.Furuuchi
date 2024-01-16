{{-- https://qiita.com/kkkanao7/items/680527275a38067f7015 --}}
<div>
    @if ($user->profile_image === null)
        {{-- プロフィール画像が無い場合 --}}
        <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="100" height="100">
        {{-- デフォルト画像を表示 --}}
    @else
        <img class="rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="100"
            height="100">
        {{-- （プロフィール画像がある場合）登録されている画像を表示する --}}
    @endif
</div>
