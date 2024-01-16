{{-- プロフィール画像を登録画面 --}}
{{-- https://qiita.com/kkkanao7/items/680527275a38067f7015 --}}
<form method="POST" action="{{ route('user.update', Auth::user()) }}" enctype="multipart/form-data">
    {{-- enctype="multipart/form-data"　
    複数の種類のデータ（テキスト、ファイルなど）を一度に扱える形式で、フォームで画像を扱う時には必須。 --}}
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="profile-image">
            @if ($user->profile_image === null)
                {{-- ↑もしもprofile_imageの中身が無かったら --}}
                <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="100" height="100">
                {{-- ダミーの画像を表示 --}}
            @else
                <img class="rounded-circle" src="{{ Storage::url($user->profile_image) }}" alt="プロフィール画像" width="100"
                    height="100">
                    {{-- そうでない場合は画像を呼び出す --}}
            @endif
            <input id="profile-image" name="profile_image" type="file"
                class="form-control @error('profile-image') is-invalid @enderror" style="display:none;" value=""
                accept="image/png, image/jpeg">
                {{-- type="file"→画像なので、file形式を指定。accept="image/png, image/jpeg"→選択できるファイル形式を制限できる。今回は画像ファイルのみ。 --}}
        </label>
        @error('profile-image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</form>
