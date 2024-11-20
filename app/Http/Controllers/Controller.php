<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * 
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('calculatrice');  
    }

    /**
     * 
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function calculate(Request $request)
    {
        
        $validated = $request->validate([
            'number1' => 'required|numeric',  // Vérifie que number1 est un nombre
            'number2' => 'required|numeric',  // Vérifie que number2 est un nombre
            'operation' => 'required|in:add,subtract,multiply,divide', // Vérifie l'opération choisie
        ]);

        
        $num1 = $validated['number1'];
        $num2 = $validated['number2'];
        $operation = $validated['operation'];

        
        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 == 0) {
                    
                    return back()->withErrors(['number2' => 'Division par zéro non permise.'])->withInput();
                }
                $result = $num1 / $num2;
                break;
            default:
                $result = null;  
                break;
        }

        
        return view('calculatrice', compact('result'));
    }
}
