@extends('layout')

@section('title', 'ToDay! - Tasks e Organização')

@section('base')

<h1 class="mb-3">Bem-vindo(a) ao ToDay! ✨</h1>

@if($tasks->isEmpty())

    <div class="text-center mt-5">

        <p class="logo-tagline">
            Você não possui nenhuma lista de tarefas,
            clique no botão e comece a se planejar e a se organizar!
        </p>

        <div class="mt-4">

            <a href="{{ route('tasks.create') }}"
               class="auth-btn auth-btn-purple btn-circle">

                <i class="bi bi-plus-lg"></i>

            </a>

        </div>

    </div>

@else

    <div class="container">
        <div class="row">

            @foreach($tasks as $task)

            <div class="col-md-4">

                <div class="card task-card"
                     style="background-color: {{ $task->color }};"
                     data-bs-toggle="modal"
                     data-bs-target="#taskModal{{ $task->id }}">

                    <div class="card-body">

                        <h5>{{ $task->title }}</h5>

                        @if($task->due_date)
                            <small>Prazo: {{ $task->due_date }}</small>
                        @endif

                    </div>
                </div>

            </div>

            @endforeach

        </div>
    </div>

@endif

@endsection
