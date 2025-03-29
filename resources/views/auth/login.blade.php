@extends('layouts.app')

@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1 class="mb-3">ログイン</h1>

            @if (session('warning'))
            <div class="alert alert-danger">
                {{ session('warning') }}
            </div>
            @endif

            <hr class="mb-4">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samuraimart-login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samuraimart-login-input" name="password" required autocomplete="current-password" placeholder="パスワード">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>パスワードが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label samuraimart-check-label w-100" for="remember">
                            次回から自動的にログインする
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn samuraimart-submit-button w-100 text-white mb-4" id="login-btn">
                    ログイン
                </button>

            </form>
            <!-- ゲストログインボタン -->
            <div class="text-center mt-0 mb-3">
                <button type="button" id="guest-login" class="btn btn-secondary w-100 py-3">ゲストログインはこちら</button>
            </div>

            <div class="text-center">
                <a class="fw-bold" href="{{ route('password.request') }}">
                    パスワードをお忘れの場合
                </a>
            </div>

            <hr class="mb-4">

            <div class="text-center">
                <a class="fw-bold" href="{{ route('register') }}">
                    新規会員登録
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('guest-login').addEventListener('click', function() {
        // ゲストユーザーのメールアドレスとパスワードを自動入力
        document.getElementById('email').value = 'guest@example.com';
        document.getElementById('password').value = 'password'; // 任意のパスワード

        // ログインボタンを自動的にクリック
        document.getElementById('login-btn').click();
    });
</script>
@endsection