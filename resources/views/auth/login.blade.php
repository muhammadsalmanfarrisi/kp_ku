<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="bagus.css">
</head>

<body>
  
  <div class="container">
    <div class="container-left">
      <img src="arsip.jpg" alt="form-login">
    </div>
    <div class="container-right">
      <h2>{{ __('Login') }}</h2>
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3 input">
          <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>
          </div>
          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong style="color: red;">{{ $message }}</strong>
          </span>
          @enderror

        <div class="row mb-3 input">
          <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <!-- <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                          {{ __('Remember Me') }}
                      </label>
                  </div>
              </div>
          </div> -->

          <button type="submit">Masuk</button>
      </form><br>
      
      <p style="text-align: center">Belum Punya Akun? Silahkan klik
    <a href="{{ route('register') }}">Registrasi User</a></p>
    </div>
  </div>
</body>

</html>