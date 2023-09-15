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
              
              <div class="text-xl pt-4 ml-4 "> Titulo: 
                <input id="title" class="form-control" type="text" name="title"  />
              </div>

              <div class="text-xl pt-4 ml-4 "> Resumo: 
                 <input id="description" class="form-control" type="text" name="description" />
              </div>

              <div class="text-xl pt-4 ml-4 "> Anexo: 
                <input id="attachment" class="form-control" type="text" name="attachment" />
              </div>

              <div class="text-xl pt-4 ml-4 mb-4">
                <button type="submit" class="btn btn-outline-primary"  >Criar Chamado</button>
              </div>
              
                 

             </form>
            </div>
        </div>
    </div>
 
</x-app-layout>
