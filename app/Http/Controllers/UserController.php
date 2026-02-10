<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Exibe a página de login
     */
    public function showLogin()
    {
        return view('login');
    }

    /**
     * Exibe a página de cadastro
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Processa o cadastro de novo usuário
     */
    public function register(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed', // Verifica se password e password_confirmation são iguais
                Password::min(8) // Mínimo 8 caracteres
                    ->numbers()   // Deve conter números
                    ->symbols(),  // Deve conter símbolos
            ],
        ], [
            // Mensagens de erro personalizadas em português
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Por favor, insira um email válido.',
            'email.unique' => 'Este email já está cadastrado.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
            'password.confirmed' => 'As senhas não correspondem.',
        ]);

        // Cria o usuário - CORREÇÃO: SEM confirm_password
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Faz login automático após cadastro
        Auth::login($user);

        // Redireciona para a página principal (ajuste conforme sua rota)
        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');
    }

    /**
     * Processa o login
     */
    public function login(Request $request)
    {
        // Validação
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'Por favor, insira um email válido.',
            'password.required' => 'A senha é obrigatória.',
        ]);

        // Tenta fazer login
        if (Auth::attempt($credentials)) {
            // Regenera a sessão para segurança
            $request->session()->regenerate();

            // Redireciona para página principal
            return redirect()->intended('home');
        }

        // Se falhar, retorna com erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->withInput();
    }

    /**
     * Faz logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}