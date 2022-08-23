<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>VTC - Dashboard</title>
  <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('css/ruang-admin.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Inscription</h1>
                  </div>

                  <!-- Validation Errors -->
                  <x-auth-validation-errors class="mb-4" :errors="$errors" />
                  
                  <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="form-group">
                      <label for="name" :value="__('Name')">Nom</label>
                      <input type="text" class="form-control" name="name" id="name"  placeholder="Entrer votre nom " :value="old('name')" required autofocus />
                    </div>
                    
                    <div class="form-group">
                      <label for="email" :value="__('Email')" >Email</label>
                      <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                        placeholder="Entrer votre Address Email " name="email" :value="old('email')" required />
                    </div>
                    <div class="form-group">
                      <label for="password" :value="__('Password')">Mot de Passe</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="entrer un mot de passe" required autocomplete="new-password" />
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation" :value="__('Confirm Password')">Répéter le Mot de Passe</label>
                      <input type="password" class="form-control" id="password_confirmation"
                        placeholder="Répéter le mot de passe" name="password_confirmation" required />
                    </div>
                    
                    <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Déjà enregistré?') }}
                </a>

                <button class="ml-5">
                    {{ __('S inscrire') }}
                <button>
            </div>
                    
                    
                    
                  </form>
                 
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
</body>

</html>