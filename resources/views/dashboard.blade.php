<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chamados
        </h2>
    </x-slot>

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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-xl ml-4 mr-4 mt-4 mb-4">Lista de chamados</div>
               
                @if(count($chamados) > 0)

                @foreach($chamados as $array)
                <div class="border border-gradient-to-r from-blue-500 to-purple-500 p-4"> 
                    <div class="text-xl ml-4 mr-4 mt-4 mb-4">Titulo: {{ $array['title'] }}</div>  
                    <div class="text-xl ml-4 mr-4 mt-4 mb-4">Resumo: {{ $array['description'] }}</div>  
                    <div class="text-xl ml-4 mr-4 mt-4 mb-4">Anexo:{{ $array['attachment'] }}</div>  
                    <div class="text-xl ml-4 mr-4 mt-4 mb-4">Status:{{ $array['status'] }}</div>  

                    <div class="text-xl ml-4 mr-4 mt-4 mb-4"> 
                        <a href="/response/{{ $array['id'] }}" class="btn btn-primary">
                            Visualizar
                        </a>
                    </div>

                </div>
               
                @endforeach 
   
              @endif
            </div>
        </div>
    </div>
</x-app-layout>
