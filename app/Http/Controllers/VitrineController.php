<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Models\Categoria;

class VitrineController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $categoriaId = $request->get('categoria_id');

        $query = Produto::with('categoria'); // Carrega a categoria

        if ($categoriaId) {
            $query->where('categoria_id', $categoriaId);
        }

        $produtos = $query->paginate(9); // ou ->get() se não quiser paginação

        return view('vitrine.index', compact('produtos', 'categorias', 'categoriaId'));
    }
}
