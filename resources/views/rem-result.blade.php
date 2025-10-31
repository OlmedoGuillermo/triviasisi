<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Resultado - REM</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fa; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        .score { font-size: 32px; font-weight: bold; color: #27ae60; margin: 20px 0; }
        .message { font-size: 18px; margin: 20px 0; }
        .btn { display: inline-block; margin-top: 20px; padding: 12px 30px; background: #3498db; color: white; text-decoration: none; border-radius: 6px; }
        .btn:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gracias por participar 🥳🥳🥳</h2>
        <div class="score">{{ $correctas }} / 15</div>
        <div class="message">
            @if($correctas >= 14)
                Aura, sos un gurú de la inclusión!
            @elseif($correctas >= 10)
                ¡Muy bien! Estás en el buen camino.
            @elseif($correctas >= 8)
                Bien, pero podrías aprender mas!
            @else
                Sigue aprendiendo. La inclusión empieza con la conciencia.
            @endif
        </div>
        <a href="{{ route('rem.inicio') }}" class="btn">Volver a jugar</a>
    </div>
</body>
</html>