
@include('partials.header')
<title>Регистрация</title>
<div class="container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="login-form"  method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="text-center mb-4">Регистрация</h2>
                    <div class="mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Имя" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Пароль" required autocomplete="new-password">
 
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Повторите пароль">
                    </div>
                    <input type="checkbox" id="authorizationCheckbox" name="authorizationCheckbox" required>
                    <label for="authorizationCheckbox">принимаю  <a class="text-decoration-none" href="{{route('messsage')}}">условия соглашения</a></label>
                    
                    <div class="d-grid mb-3">
                        <button class="btn  btn-lg" type="submit">Зарегистрироваться</button>
                    </div>
                    <p class="text-center"><small>Есть аккаунт? <a class="text-decoration-none text-reset hmlb" href="{{ route('login') }}">Войти</a></small></p>
                </form>
            </div>
        </div>
    </div>
    
