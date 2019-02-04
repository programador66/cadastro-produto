<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Categoria::all();
        $prod = Produto::all();
        return view('produtos', compact('cat', 'prod'));
    }

    public function listaComboCategoria()
    {
        $prod = Categoria::all();
        return view('produtos', compact('prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prod = new Produto();
        $prod->nome = $request->input('nomeProd');
        $prod->estoque = $request->input('estoqueProd');
        $prod->preco = $request->input('precoProd');
        $prod->categoria_id = $request->input('prodCombo');
        $prod->save();

        return redirect('produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prod = Produto::find($id);
        $prod->nome = $request->input('nomeProd');
        $prod->estoque = $request->input('estoqueProd');
        $prod->preco = $request->input('precoProd');
        $prod->categoria_id = $request->input('prodCombo');
        $prod->update();

        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Produto::find($id);
        $cat->delete();
        return redirect('/produtos');
    }
}