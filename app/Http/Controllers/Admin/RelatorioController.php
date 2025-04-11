<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Produto;
use App\Models\User;

class RelatorioController extends Controller
{
    public function vendas(Request $request)
    {
        $vendas = Venda::with('user')->orderBy('created_at', 'desc');

        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $vendas->whereBetween('created_at', [$request->data_inicio, $request->data_fim]);
        }

        return view('admin.relatorios.vendas', ['vendas' => $vendas->get()]);
    }

    public function estoque()
    {
        $produtos = Produto::all();
        return view('admin.relatorios.estoque', compact('produtos'));
    }

    public function clientes()
    {
        $clientes = User::where('is_admin', false)->get();
        return view('admin.relatorios.clientes', compact('clientes'));
    }
}
