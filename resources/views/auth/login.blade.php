@include('partials.header')
<title>Авторизация</title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="login-form"method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class="text-center mb-4">Вход</h2>
                <div class="mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Пароль">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
                <div class="row justify-content-center mb-0">
                    <div class="col-12 col-md-6 text-center">
                        <button class="btn btn-outline-white btn-lg" type="submit">Войти</button>
                    </div>
                </div>
                <div class="row justify-content-center mb-0">
                  
                </div>
                </div>
                <p class="text-center"><small>У вас нет аккаунта? <a class="text-decoration-none text-reset hmlb" href="{{ route('register') }}">Зарегистрируйтесь</a></small></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>
