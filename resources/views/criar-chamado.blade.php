<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Chamado
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">Criar Chamado</h1>
                <form method="POST" action="/chamados/novo" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Título:</label>
                        <input id="title" type="text" name="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Resumo:</label>
                        <textarea id="description" name="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="attachment" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded cursor-pointer">
                        <i class="fas fa-cloud-upload-alt"></i> Escolha um arquivo
                        </label>
                        <input id="attachment" type="file" name="attachment" class="hidden">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded cursor-pointer">Criar Chamado</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
