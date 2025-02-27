@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-center mb-4">Editar Cliente</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nome:</label>
            <input type="text" name="nome" class="w-full p-2 border rounded" value="{{ $cliente->nome }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">E-mail:</label>
            <input type="email" name="email" class="w-full p-2 border rounded" value="{{ $cliente->email }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Telefone:</label>
            <input type="text" name="telefone" class="w-full p-2 border rounded" value="{{ $cliente->telefone }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Endereço:</label>
            <input type="text" name="endereco" class="w-full p-2 border rounded" value="{{ $cliente->endereco }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Cidade:</label>
            <input type="text" name="cidade" class="w-full p-2 border rounded" value="{{ $cliente->cidade }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Estado:</label>
            <input type="text" name="estado" class="w-full p-2 border rounded" value="{{ $cliente->estado }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">CEP:</label>
            <input type="text" name="cep" class="w-full p-2 border rounded" value="{{ $cliente->cep }}">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Atualizar</button>
    </form>
</div>
@endsection
