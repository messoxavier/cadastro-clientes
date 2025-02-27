<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    // Listar clientes
    public function index()
    {
        $clientes = DB::select("SELECT * FROM clientes");
        return view('clientes.index', compact('clientes'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        return view('clientes.create');
    }

    // Salvar novo cliente no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:50',
            'cep' => 'nullable|string|max:20',
        ]);

        DB::insert("INSERT INTO clientes (nome, email, telefone, endereco, cidade, estado, cep) VALUES (?, ?, ?, ?, ?, ?, ?)", [
            $request->nome,
            $request->email,
            $request->telefone,
            $request->endereco,
            $request->cidade,
            $request->estado,
            $request->cep
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit($id)
    {
        $cliente = DB::selectOne("SELECT * FROM clientes WHERE id = ?", [$id]);
        return view('clientes.edit', compact('cliente'));
    }

    // Atualizar cliente no banco
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clientes,email,'.$id,
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:50',
            'cep' => 'nullable|string|max:20',
        ]);

        DB::update("UPDATE clientes SET nome = ?, email = ?, telefone = ?, endereco = ?, cidade = ?, estado = ?, cep = ? WHERE id = ?", [
            $request->nome,
            $request->email,
            $request->telefone,
            $request->endereco,
            $request->cidade,
            $request->estado,
            $request->cep,
            $id
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    // Excluir cliente do banco
    public function destroy($id)
    {
        DB::delete("DELETE FROM clientes WHERE id = ?", [$id]);
        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}
