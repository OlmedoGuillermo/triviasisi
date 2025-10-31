<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TriviaController extends Controller
{
    public function inicio(Request $request)
    {
        // Reinicia la sesión al comenzar
        $request->session()->forget(['respuestas', 'indice']);
        return $this->mostrarPregunta($request, 0);
    }

    public function guardarYAvanzar(Request $request)
    {
        $indice = (int) $request->input('indice');
        $respuesta = $request->input('respuesta');

        // Guardar respuesta en sesión
        $respuestas = $request->session()->get('respuestas', []);
        $respuestas[$indice] = $respuesta;
        $request->session()->put('respuestas', $respuestas);

        $siguiente = $indice + 1;

        // Si es la última pregunta, ir a resultado
        if ($siguiente >= 15) {
            return redirect()->route('rem.resultado');
        }

        return $this->mostrarPregunta($request, $siguiente);
    }

    private function mostrarPregunta(Request $request, $indice)
    {
        $path = storage_path('app/goat.json');
        if (!file_exists($path)) {
            abort(500, 'Archivo goat.json no encontrado.');
        }

        $preguntas = json_decode(file_get_contents($path), true);
        if (json_last_error() !== JSON_ERROR_NONE || !isset($preguntas[$indice])) {
            abort(500, 'Error al cargar las preguntas.');
        }

        $pregunta = $preguntas[$indice];
        return view('rem', compact('pregunta', 'indice'));
    }

    public function resultado(Request $request)
    {
        $path = storage_path('app/goat.json');
        $preguntas = json_decode(file_get_contents($path), true);
        $respuestas = $request->session()->get('respuestas', []);

        $correctas = 0;
        foreach ($respuestas as $index => $respuesta) {
            if (isset($preguntas[$index]) && $respuesta === $preguntas[$index]['correct_answer']) {
                $correctas++;
            }
        }

        return view('rem-result', compact('correctas'));
    }
}