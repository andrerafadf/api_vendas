<?php

namespace App\Http\Controllers;

use App\Pedido;
use Illuminate\Http\Request;
use Monolog\Handler\TestHandler;

class PedidosController extends Controller
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
        return Pedidos::all();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedido($request->all());
        try{
            return \Response::json($pedido->save());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            return Pedido::find($id);
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = \Request::all();

        $pedido = Pedido::find($id);

        $pedido->produto_id     = $request['produto_id'];
        $pedido->qtd            = $request['qtd'];
        $pedido->valor_unitario = $request['valor_unitario'];
        $pedido->data           = $request['data'];
        $pedido->solicitante    = $request['solicitante'];
        $pedido->endereco       = $request['endereco'];
        $pedido->despachante    = $request['despachante'];
        $pedido->situacao_id    = $request['situacao_id'];

        try{
            return \Response::json($pedido->save());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        try{
            return \Response::json($pedido->delete());
        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
}
