<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\ItemVenda;
use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = session()->get('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    public function adicionar($id)
    {
        $produto = Produto::findOrFail($id);
        $carrinho = session()->get('carrinho', []);

        if (isset($carrinho[$id])) {
            $carrinho[$id]['quantidade']++;
        } else {
            $carrinho[$id] = [
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'imagem' => $produto->imagem,
                'quantidade' => 1
            ];
        }

        session()->put('carrinho', $carrinho);
        return redirect()->route('carrinho.index');
    }

    public function remover($id)
    {
        $carrinho = session()->get('carrinho', []);
        if (isset($carrinho[$id])) {
            unset($carrinho[$id]);
            session()->put('carrinho', $carrinho);
        }

        return redirect()->route('carrinho.index');
    }

    public function finalizar()
    {
        $carrinho = session()->get('carrinho', []);
        if (!$carrinho || count($carrinho) === 0) {
            return redirect()->route('carrinho.index')->with('error', 'Carrinho vazio!');
        }

        $venda = Venda::create([
            'user_id' => Auth::id(),
            'total' => collect($carrinho)->sum(fn($item) => $item['preco'] * $item['quantidade']),
        ]);

        foreach ($carrinho as $produtoId => $item) {
            ItemVenda::create([
                'venda_id' => $venda->id,
                'produto_id' => $produtoId,
                'quantidade' => $item['quantidade'],
                'preco' => $item['preco'],
            ]);
        }

        session()->forget('carrinho');

        return redirect()->route('vitrine.index')->with('success', 'Compra realizada com sucesso!');
    }
}
