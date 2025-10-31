@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Trivia</h1>
    <form method="POST" action="{{ route('trivia.check') }}">
        @csrf
        @foreach($questions as $index => $q)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $index + 1 }}. {{ $q['question'] }}</h5>
                    @foreach($q['options'] as $option)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answers[{{ $index }}]" value="{{ $option }}" id="q{{ $index }}_{{ $loop->index }}" required>
                            <label class="form-check-label" for="q{{ $index }}_{{ $loop->index }}">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Enviar respuestas</button>
    </form>
</div>
@endsection