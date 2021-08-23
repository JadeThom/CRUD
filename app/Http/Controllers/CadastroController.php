<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cadastros = Cadastro::all();
        return view('admin.index', compact('cadastros'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nome' => 'required|max:255',
            'sobrenome' => 'required',
            'email' => 'required',
            'data_nascimento' => 'required'
        ]);
        $show = Cadastro::create($validate);
        return redirect('cadastro')->with('sucess', 'Cadastrado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cadastros = Cadastro::findOrFail($id);
        return view('admin.show', compact('cadastros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cadastros = Cadastro::findOrFail($id);
        return view('admin.edit', compact('cadastros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cadastro)
    {

        $cadastros = Cadastro::findOrFail($cadastro);

        $cadastros->update($request->all());
        return redirect('cadastro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cadastros = Cadastro::findOrFail($id);
        $cadastros->delete();
        return redirect('cadastro')->with('success', 'Cadastro Excluído com Sucesso!');
    }
}
