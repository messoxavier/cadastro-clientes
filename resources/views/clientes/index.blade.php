@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-center mb-4">Lista de Clientes</h1>
    
    <div class="text-right mb-4">
        <a href="{{ route('clientes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Adicionar Novo Cliente</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border rounded-lg">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Nome</th>
                <th class="py-2 px-4 border">E-mail</th>
                <th class="py-2 px-4 border">Cidade</th>
                <th class="py-2 px-4 border text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            <tr class="border-b">
                <td class="py-2 px-4">{{ $cliente->id }}</td>
                <td class="py-2 px-4">{{ $cliente->nome }}</td>
                <td class="py-2 px-4">{{ $cliente->email }}</td>
                <td class="py-2 px-4">{{ $cliente->cidade }}</td>
                <td class="py-2 px-4 text-center">
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700">Editar</a>
                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700" onclick="return confirm('Tem certeza que deseja excluir este cliente?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
