<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class KeepController extends Controller
{
    public function index() {
        $notas = Nota::all();
        return view('keep/index', [
            'notas' => $notas
        ]);
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $dados = $request->validate(['nota' => 'required', 'cor' => 'required']);
            Nota::create($dados);
            return redirect()->route('keep.index');
        }

        return view('keep/create');
    }   

    // public function
}
