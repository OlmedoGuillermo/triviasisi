@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultado de la Trivia</h1>
    <div class="alert alert-info">
        Tu puntuación: <strong>{{ $score }} de {{ count($questions) }}</strong>
    </div>

    <h3>Respuestas:</h3>
    @foreach($questions as $index => $q)
        <div class="card mb-2">
            <div class="card-body">
                <p><strong>{{ $index + 1 }}. {{ $q['question'] }}</strong></p>
                <p>Tu respuesta: <strong>{{ $answers[$index] ?? 'No respondida' }}</strong></p>
                <p>Correcta: <strong>{{ $q['correct_answer'] }}</strong></p>
                @if (($answers[$index] ?? null) === $q['correct_answer'])
                    <span class="text-success">✅ Correcto</span>
                @else
                    <span class="text-danger">❌ Incorrecto</span>
                @endif
            </div>
        </div>
    @endforeach

    <a href="{{ route('trivia.index') }}" class="btn btn-secondary">Volver a jugar</a>
</div>
@endsection