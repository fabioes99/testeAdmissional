<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Responder o Chamado
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            <div class="text-xl pt-4 ml-4 "> Titulo: {{ $dadosChamado['id'] }}</div>
            <div class="text-xl pt-4 ml-4 "> {{ $dadosChamado['description'] }}</div>
            <div class="text-xl pt-4 ml-4 "> Anexo: {{ $dadosChamado['attachment'] }}</div>
            <div class="text-xl pt-4 ml-4 "> Respostas:</div>
            @foreach($respostas as $key => $value)
            <div class="text-base pt-4 ml-4 ">
                {{ $respostas[$key]['response'].'-'.$respostas[$key]['created_at'] }}
            </div>
            <br>
            @endforeach

            @if( $dadosChamado['status'] === 'Finalizado' )
            <div class="ml-4 mr-4 mt-4 mb-4">
                Chamado Finalizado!            
            </div>
            @else
                <form method="POST" action="/response/insert/{{ $dadosChamado['id'] }}" enctype="multipart/form-data">
                @csrf
                    @if(auth()->user()->role === 'Colaborador')
                        <div class="ml-4 mr-4 mt-4 mb-4">
                            
                            <input type="text" class="form-control" name="response" id="response" aria-describedby="response" placeholder="Escreva sua resposta">
                            
                        </div>
                        <div class="ml-4 mr-4 mt-4 mb-4">
                            <button type="submit" class="btn btn-outline-primary" >Responder o chamado</button>
                        </div>
                    @endif   
                    <div class="ml-4 mr-4 mt-4 mb-4">
                        <a href="{{ route('finalizar', ['id' => $dadosChamado['id'] ]) }}" class="btn btn-outline-warning">Finalizar Chamado</a>
                    </div>
                </form>
            @endif
            </div>
        </div>
    </div>
 
</x-app-layout>
