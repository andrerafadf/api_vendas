<?php

namespace App\Http\Controllers;

use App\Situacao;
use Illuminate\Http\Request;

class SituacoesController extends Controller
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
        return Situacao::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $situacao = new Situacao(\Request::all());
        try{
            return \Response::json($situacao->save());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Situacao  $situacao
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return Situacao::find($id);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Situacao  $situacao
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $post = \Request::all();

        $situacao = Situacao::find($id);
        $situacao->nome = $post['nome'];
        try{
            return \Response::json($situacao->save());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Situacao  $situacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $situacao = Situacao::find($id);
        try{
            return \Response::json($situacao->delete());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
