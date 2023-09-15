<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Chamado
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <form method="POST" action="/chamados/novo" enctype="multipart/form-data">
            @csrf
              <div>
                  <x-label for="title" value="titulo" />
                  <input id="title" class="block mt-1 w-full" type="text" name="title"  />
              </div>

              <div>
                <x-label for="description" value="descricao" />
                <input id="description" class="block mt-1 w-full" type="text" name="description" />
            </div>

            <div>
                <x-label for="attachment" value="anexo" />
                <input id="attachment" class="block mt-1 w-full" type="text" name="attachment" />
            </div>
             <button type="submit" >Criar Chamado</button>

             </form>
            </div>
        </div>
    </div>
 
</x-app-layout>
