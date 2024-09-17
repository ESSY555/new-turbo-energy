<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional styles for carousel background */
        .carousel-container {
            position: relative;
            overflow: hidden;
            height: 100vh;
        }

        .carousel {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1; /* Place the carousel behind other elements */
            height: 100vh
        }
    </style>
</head>
<body>

    <div class="carousel-container" style="height: 100vh">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/turbo enargy building.jpg" class="d-block w-100" alt="First Slide">
                </div>
                <div class="carousel-item">
                    <img src="images/turbo energy building2.jpg" class="d-block w-100" alt="Third Slide">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
        <div class="container main-div justify-content-center align-items-center">
            <div class="row hx pt-5 justify-content-center">
              <div class="col-md-8 hy">
                    <div class="">
                        <!-- Your login form content -->
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header">{{ __('Login') }}</div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                                    <input type="email" class="form-control" id="email" name="email" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="remember">
                                                                {{ __('Remember Me') }}
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="my-button">
                                                            @if (Route::has('password.request'))
                                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                                    {{ __('Forgot Your Password?') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="submit" class="btn btn-primary form-control">{{ __('Login') }}</button>

                                            </form>
                                            <p class="pt-3">you don't have an account yet? <a href="register">register here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
