<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::all();

        return view('home', ['pessoas' => $pessoas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:pessoas,email',
            'cpf' => 'required|unique:pessoas,cpf'
        ]);

        Pessoa::create($data);

        return redirect()->route('home')->with('msg', 'Pessoa criada com sucesso!');
    }


    public function edit(Pessoa $pessoa)
    {
        return view('edit', ['pessoa'=>$pessoa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        $pessoa -> update($request->all());

        return redirect()->route('home') -> with('msg', 'Pessoa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa -> delete();

        return redirect()->route('home')->with('msg', 'Pessoa deletada com sucesso!');
    }
}
