<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Responder o Chamado
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <div class=" h-auto mb-4">
                    <img src="/storage/{{ $dadosChamado['attachment'] }}" class="w-full h-auto" alt="{{ $dadosChamado['description'] }}">
                </div>

                <h1 class="text-2xl font-semibold mb-4">Título: {{ $dadosChamado['title'] }}</h1>
                <p class="text-lg mb-4">{{ $dadosChamado['description'] }}</p>
                <h2 class="text-xl font-semibold mb-4">Respostas:</h2>
                @foreach($respostas as $key => $value)
                    <p class="text-base mb-2">{{ $respostas[$key]['response'] }} - {{ $respostas[$key]['created_at'] }}</p>
                @endforeach

                @if( $dadosChamado['status'] === 'Finalizado' )
                    <div class="inline-block bg-green-200 text-green-700 rounded p-2 mb-4">
                        Chamado Finalizado!
                    </div>
                @else
                    <form method="POST" action="/response/insert/{{ $dadosChamado['id'] }}" enctype="multipart/form-data" class="mb-4">
                        @csrf
                        @if(auth()->user()->role === 'Colaborador')
                            <div class="mb-4">
                                <textarea type="text" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="response" id="response" ></textarea>
                            </div>
                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 text-white font-semibold px-4 py-2 rounded">Responder o chamado</button>
                            </div>
                        @endif
                        <div class="mb-4">
                            <a href="{{ route('finalizar', ['id' => $dadosChamado['id'] ]) }}" class="bg-yellow-500 text-white font-semibold px-4 py-2 rounded">Finalizar Chamado</a>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>


</x-app-layout>
