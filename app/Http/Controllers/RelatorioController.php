<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;

class RelatorioController extends Controller
{
    public function estoque()
    {
        $produtos = Produto::all();
        return view('admin.relatorios.estoque', compact('produtos'));
    }

    public function clientes()
    {
        $clientes = User::where('is_admin', 0)->get();
        return view('admin.relatorios.clientes', compact('clientes'));
    }

    public function vendas(Request $request)
    {
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');

        $vendas = Venda::when($dataInicio, fn($q) => $q->where('created_at', '>=', $dataInicio))
                       ->when($dataFim, fn($q) => $q->where('created_at', '<=', $dataFim))
                       ->with('user')
                       ->get();

        return view('admin.relatorios.vendas', compact('vendas', 'dataInicio', 'dataFim'));
    }
}
