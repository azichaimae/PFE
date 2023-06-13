<!DOCTYPE html>
<html>
<head>
    <title>Wasted to Wanted - Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <style>
    *{
        font-family: 'Montserrat', sans-serif;
    }
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    @media (max-width: 450px) {
      .h-custom {
        height: 100%;
      }
    }
  </style>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{asset('images/planet.jpg')}}"
                    class="img-fluid" alt="Noon store">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-1 mt-1" style="padding: 10px">Sign up</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Name Input -->
                        <div class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control form-control-lg"
                            placeholder="Enter your Name" required/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" required/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                            placeholder="Enter password" required autocomplete="new-password"/>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg"
                            placeholder="Confirm password" required autocomplete="new-password"/>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="terms" />
                                <label class="form-check-label" for="form2Example3">
                                    I agree all statements in <a href="#!">Terms of service</a>
                                </label>
                            </div>
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;" >Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/ebf5efcd0f.js" crossorigin="anonymous"></script>
</body>
</html>
