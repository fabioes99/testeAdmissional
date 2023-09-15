<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Chamados
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                Lista de chamados <br>
               
                @if(count($chamados) > 0)

                @foreach($chamados as $array)
                <a href="/response/{{ $array['id'] }}" class="btn btn-primary">
                <tr>
                    <td>{{ $array['title'] }}</td>  
                </tr>
                <tr>
                    <td>{{ $array['description'] }}</td>  
                </tr>
                <tr>
                    <td>{{ $array['attachment'] }}</td>  
                </tr>
                <tr>
                    <td>{{ $array['status'] }}</td>  
                </tr>
                </a>
                <br>
                @endforeach 
   
              @endif
            </div>
        </div>
    </div>
</x-app-layout>
