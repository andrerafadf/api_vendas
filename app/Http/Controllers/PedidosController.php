<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
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
    public function store()
    {
        $post = \Request::all();
        $pedido = new Pedido();
        $pedido->data = date('Y-m-d');
        $pedido->solicitante = $post['solicitante'];
        $pedido->endereco = $post['endereco'];
        $pedido->despachante = $post['despachante'];
        $pedido->situacao_id = $post['situacao_id'];

        try{
            $pedido->save();
            foreach ($post['produtos'] as $produto){
                $pedidoProduto = new PedidoProduto();
                $pedidoProduto->produto_id = $produto['id'];
                $pedidoProduto->pedido_id = $pedido->id;
                $pedidoProduto->qtd = $produto['qtd'];
                $pedidoProduto->valor = $produto['valor'];
                $pedidoProduto->save();
            }
            return true;
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
        $post = \Request::all();

        try{
            $pedido = Pedido::find($id);

            $pedido->solicitante    = $post['solicitante'];
            $pedido->endereco       = $post['endereco'];
            $pedido->despachante    = $post['despachante'];
            $pedido->situacao_id    = $post['situacao_id'];

            PedidoProduto::where('pedido_id', $pedido->id)->delete();
            foreach ($post['produtos'] as $produto){
                $pedidoProduto = new PedidoProduto();
                $pedidoProduto->produto_id = $produto['id'];
                $pedidoProduto->pedido_id = $pedido->id;
                $pedidoProduto->qtd = $produto['qtd'];
                $pedidoProduto->valor = $produto['valor'];
                $pedidoProduto->save();
            }

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
