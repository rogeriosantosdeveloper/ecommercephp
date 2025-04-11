<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProdutos = Produto::count();
        $totalClientes = User::where('is_admin', false)->count();
        $totalVendas = Venda::count();
        $faturamento = Venda::sum('total');

        return view('admin.dashboard', compact(
            'totalProdutos',
            'totalClientes',
            'totalVendas',
            'faturamento'
        ));
    }
}
