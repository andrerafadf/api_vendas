<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function lists(Request $request)
    {
        return Produto::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();
        $produto = new Produto();
        $produto->nome = $req['nome'];
        $produto->valor = $req['valor'];
        $produto->qtd = $req['qtd'];
        try{
            return \Response::json($produto->save());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return Produto::find($id);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = \Request::all();

        $produto = Produto::find($id);
        $produto->nome = $request['nome'];
        $produto->valor = $request['valor'];
        $produto->qtd = $request['qtd'];

        try{
            return \Response::json($produto->save());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        try{
            return \Response::json($produto->delete());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
