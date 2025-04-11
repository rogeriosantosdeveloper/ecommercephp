<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = User::where('is_admin', 1)->get();
        return view('admin.funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('admin.funcionarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 1
        ]);

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário cadastrado!');
    }

    public function edit(User $funcionario)
    {
        return view('admin.funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, User $funcionario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $funcionario->id,
        ]);

        $funcionario->update($request->only('name', 'email'));

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado!');
    }

    public function destroy(User $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido!');
    }
}
