<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
  <link rel="icon" href="{{ asset('images/roxo.png') }}" type="image/x-icon">
  <title>ToDay! - Login</title>
</head>

<body>
  <div class="auth-container">
    
    <!-- Lado esquerdo - Logo -->
    <div class="auth-side auth-side-left">
      <div class="logo-container">
        <img src="{{ asset('images/logoRoxa.png') }}" alt="ToDay Logo" class="auth-logo">
        <p class="logo-tagline">Organize seu dia, conquiste seus objetivos</p>
      </div>
    </div>

    <!-- Lado direito - Formulário de Login -->
    <div class="auth-side auth-side-right">
      <div class="auth-card auth-card-purple">
        <h2 class="auth-title">Bem-vindo!</h2>
        <p class="auth-subtitle">Faça login para continuar</p>

        @if ($errors->any())
          <div class="alert alert-danger alert-custom">
            <i class="bi bi-exclamation-circle"></i>
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="auth-form">
          @csrf
          
          <div class="form-group">
            <label for="email" class="form-label">
              <i class="bi bi-envelope"></i> Email
            </label>
            <input 
              type="email" 
              class="form-control auth-input" 
              id="email" 
              name="email" 
              value="{{ old('email') }}"
              placeholder="seu@email.com" 
              required
            >
          </div>

          <div class="form-group">
            <label for="password" class="form-label">
              <i class="bi bi-lock"></i> Senha
            </label>
            <div class="password-input-wrapper">
              <input 
                type="password" 
                class="form-control auth-input" 
                id="password" 
                name="password" 
                placeholder="••••••••" 
                required
              >
              <button type="button" class="password-toggle" onclick="togglePassword('password')">
                <i class="bi bi-eye" id="password-icon"></i>
              </button>
            </div>
          </div>

          <button type="submit" class="btn auth-btn auth-btn-purple">
            <i class="bi bi-box-arrow-in-right"></i> Entrar
          </button>

          <div class="auth-link">
            Não tem uma conta? 
            <a href="{{ route('register') }}" class="link-purple">Cadastre-se aqui</a>
          </div>
        </form>
      </div>
    </div>

  </div>

  <!-- JavaScript -->
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>