@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold text-center mb-6">Cadastro de Cliente</h1>
    
    <form action="{{ route('clientes.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nome" class="block font-medium">Nome Completo</label>
                <input type="text" id="nome" name="nome" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="email" class="block font-medium">E-mail</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="telefone" class="block font-medium">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="endereco" class="block font-medium">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label for="cidade" class="block font-medium">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="estado" class="block font-medium">Estado</label>
                <input type="text" id="estado" name="estado" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="cep" class="block font-medium">CEP</label>
                <input type="text" id="cep" name="cep" class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>

        <div class="flex justify-center space-x-4">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">Salvar</button>
            <a href="{{ route('clientes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
