<x-app-layout>


    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="text-2xl text-center font-semibold ml-4 mr-4 mt-4 mb-8">Lista de Chamados</div>

            @if(count($chamados) > 0)
                @foreach($chamados as $array)
                    <div class=" flex flex-row border p-6 mb-8 ">
                        <div class="flex-grow">
                            <div class="text-xl font-semibold mb-4">Título: {{ $array['title'] }}</div>
                            <div class="text-lg mb-4">{{ $array['description'] }}</div>
                            <div class="text-lg mb-4">Status: {{ $array['status'] }}</div>
                        </div>

                        <div class="flex items-center">
                            <a href="/response/{{ $array['id'] }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                                Visualizar
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-xl font-semibold ml-4 mr-4 mt-4 mb-4">Nenhum chamado disponível.</div>
            @endif
        </div>
    </div>
</x-app-layout>
