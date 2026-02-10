<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  
  <!-- CSS personalizado -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  
  <link rel="icon" href="{{ asset('images/roxo.png') }}" type="image/x-icon">
  <title>ToDay! - Cadastro</title>
</head>

<body>
  <div class="auth-container">
    
    <!-- Lado esquerdo - Formulário de Cadastro -->
    <div class="auth-side auth-side-left">
      <div class="auth-card auth-card-green">
        <h2 class="auth-title">Crie sua conta</h2>
        <p class="auth-subtitle">Comece a organizar suas tarefas hoje!</p>

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

        <form action="{{ route('register') }}" method="POST" class="auth-form" id="registerForm">
          @csrf
          
          <div class="form-group">
            <label for="name" class="form-label">
              <i class="bi bi-person"></i> Nome Completo
            </label>
            <input 
              type="text" 
              class="form-control auth-input" 
              id="name" 
              name="name" 
              value="{{ old('name') }}"
              placeholder="Seu nome completo" 
              required
            >
          </div>

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
                minlength="8"
                required
              >
              <button type="button" class="password-toggle" onclick="togglePassword('password')">
                <i class="bi bi-eye" id="password-icon"></i>
              </button>
            </div>
            <div class="password-strength" id="passwordStrength"></div>
            <small class="form-text">Mínimo 8 caracteres, incluindo número e caractere especial</small>
          </div>

          <div class="form-group">
            <label for="confirm_password" class="form-label">
              <i class="bi bi-lock-fill"></i> Confirmar Senha
            </label>
            <div class="password-input-wrapper">
              <input 
                type="password" 
                class="form-control auth-input" 
                id="confirm_password" 
                name="password_confirmation"
                placeholder="••••••••" 
                minlength="8"
                required
              >
              <button type="button" class="password-toggle" onclick="togglePassword('confirm_password')">
                <i class="bi bi-eye" id="confirm_password-icon"></i>
              </button>
            </div>
            <div class="password-match" id="passwordMatch"></div>
          </div>

          <button type="submit" class="btn auth-btn auth-btn-green">
            <i class="bi bi-person-plus"></i> Cadastrar
          </button>

          <div class="auth-link">
            Já tem uma conta? 
            <a href="{{ route('login') }}" class="link-green">Faça login aqui</a>
          </div>
        </form>
      </div>
    </div>

    <!-- Lado direito - Logo -->
    <div class="auth-side auth-side-right">
      <div class="logo-container">
        <img src="{{ asset('images/logoVerde.png') }}" alt="ToDay Logo" class="auth-logo">
        <p class="logo-tagline">Organize seu dia, conquiste seus objetivos</p>
      </div>
    </div>

  </div>

  <!-- JavaScript -->
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>