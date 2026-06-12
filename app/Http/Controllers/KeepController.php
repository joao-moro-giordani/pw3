<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class KeepController extends Controller
{
    public function index() {
        $notas = Nota::all();
        return view('keep.index', [
            'notas' => $notas
        ]);
    }

    public function create(Request $request) {
        if ($request->isMethod('post')) {
            $dados = $request->validate(['nota' => 'required|min:5|max:255', 'cor' => 'required', 'iamgem' => 'nullable|image']);

            if ($request->hasFile('imagem')) {
                $dados['imagem'] = $request->file('imagem')->store('imagens', 'public');
            }

            Nota::create($dados);
            return redirect()->route('keep.index')->with('mensagem', 'Nota criada com sucesso!');
        }

        return view('keep.create');
    }   

    public function  edit(Request $request, Nota $nota)
    {
        $nota = Nota::findOrFail($nota->id);
        if ($request->isMethod('put')) {
            $dados = $request->validate(['nota' => 'required|min:5|max:255', 'cor' => 'required', 'imagem' => 'nullable|image|max:2048']);
            if ($request->hasFile('imagem')) {
                if ($nota->imagem) {
                    \Storage::disk('public')->delete($nota->imagem);
                }
                $dados['imagem'] = $request->file('imagem')->store('imagens', 'public');

            }
            $nota->update($dados);
            return redirect()->route('keep.index')->with('mensagem', 'Nota editada com sucesso!');
        }

        return view('keep.create', [
            'nota' => $nota,
        ]);
    }

    public function delete(Nota $nota) 
    {
        if (request()->isMethod('delete')) {
            $nota->timestamps = false;
            $nota->delete();
            return redirect()->route('keep.index')->with('mensagem', 'Nota excluída com sucesso!');
        }

        return view('keep.delete', [
            'nota' => $nota,
        ]);
    }

    public function trash() {
        $notas = Nota::onlyTrashed()->get();
        return view('keep.trash', [
            'notas' => $notas
        ]);
    }

    public function restore(Nota $nota) {
        $nota->timestamps = false;
        $nota->restore();
        return redirect()->route('keep.index')->with('mensagem', 'Nota restaurada com sucesso!');
    }
}
