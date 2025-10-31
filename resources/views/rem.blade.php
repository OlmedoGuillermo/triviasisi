<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>REM - Pregunta {{ $indice + 1 }} de 15</title>
    <style>
        body { font-family: Arial, sans-serif; background:rgb(179,158,181); padding: 20px; }
        .container { max-width: 700px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        h2 { color: #2c3e50; margin-bottom: 25px; line-height: 1.4; }
        .option { margin: 12px 0; }
        label { display: block; padding: 12px; background: #f8f9fa; border: 1px solid #e9ecef; border-radius: 8px; cursor: pointer; transition: background 0.2s; }
        label:hover { background: #e9ecef; }
        input[type="radio"] { margin-right: 10px; }
        .btn { background: #3498db; color: white; border: none; padding: 12px 24px; font-size: 16px; border-radius: 6px; cursor: pointer; width: 100%; margin-top: 20px; }
        .btn:hover { background: #2980b9; }
        .progress { font-size: 14px; color: #7f8c8d; margin-bottom: 15px; text-align: right; }
    </style>
</head>
<body>
    <div class="container">
        
        <h2>{{ $pregunta['question'] }}</h2>

        <form method="POST" action="{{ route('rem.pregunta') }}">
            @csrf
            <input type="hidden" name="indice" value="{{ $indice }}">

            @foreach($pregunta['options'] as $opt)
                <div class="option">
                    <label>
                        <input type="radio" name="respuesta" value="{{ $opt }}" required>
                        {{ $opt }}
                    </label>
                </div>
            @endforeach

            <button type="submit" class="btn">Siguiente</button>
        </form>
    </div>
</body>
</html>