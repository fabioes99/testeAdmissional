<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Responder o Chamado
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            {{ $dadosChamado['id'].$dadosChamado['description'].$dadosChamado['attachment'] }}

            @foreach($respostas as $key => $value)
            <div>
                  {{ $respostas[$key]['response'].$respostas[$key]['role'].$respostas[$key]['created_at'] }}
              </div>
            <br>
            @endforeach

            <form method="POST" action="/response/insert/{{ $dadosChamado['id'] }}" enctype="multipart/form-data">
            @csrf
                @if(auth()->user()->role === 'Colaborador')
                    <input type="text" name="response" id="response"/>
                    <button type="submit" >Responder o chamado</button>
                @endif   
             <button >Finalizar o chamado</button>

             </form>
            </div>
        </div>
    </div>
 
</x-app-layout>
