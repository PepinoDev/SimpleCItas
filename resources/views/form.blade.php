<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($note) ? 'Editar publicación' : 'Nueva publicación' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($note) ? route('note.update', $note->id) : route('note.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($note)
                            @method('put')
                        @endisset
                
                        <div>
                            <x-input-label for="title" value="Titulo" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="$note->title ?? old('title')" autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="text" value="Contenido" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="text" name="text" type="text" class="mt-1 block w-full" autofocus>{{ $note->text ?? old('text') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('text')" />
                        </div>
                        
                            <x-input-label for="foto" value="Imagen de portada" />
                            <label class="block mt-2">
                              <span class="sr-only">Ingresar foto</span>
                              <input type="file" id="foto" name="img_portada" accept="image/*" class="block w-full text-sm text-slate-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-violet-50 file:text-violet-700
                                  hover:file:bg-violet-100" 
                                  />
                          </label>
                              <div id="dropzone" class="shrink-0 my-2 flex flex-wrap">
                                      <div class="max-w-sm bg-white border border-gray-200 mx-auto my-2 md:m-4 rounded-lg shadow dark:bg-gray-800">
                                          <img id="newFoto" class="h-64 w-128 object-cover" src="{{ isset($note->img_portada) ? asset('storage/img/'.$note->img_portada) : 'No hay imagenes' }}" alt="foto" srcset="">
                                        {{-- <div class="p-5 flex flex-col">
                                          
                                            <a class="inline mx-auto px-3 py-2 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <form method="post" action="{{route('note.removeFoto', $note->img_portada)}}" class="inline">
                                              @csrf 
                                              @method('put')
                                              <button onclick="return confirm('Eliminar la foto?')">Eliminar</button></form></a>
                                          </div> --}}
                                      </div>

                              </div>
        {{-- @dump($file); --}}
                              {{-- @if (isset($note))
                              <x-input-label for="file" value="Imagenes" />
                              <label class="block mt-2">
                                  <span class="sr-only">Ingresar imagenes</span>
                                  <input type="file" id="file" name="files[]" multiple accept="image/*" class="block w-full text-sm text-slate-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-violet-700
                                      hover:file:bg-violet-100" 
                                      />
                              </label>
                              <div id="dropzone" class="shrink-0 my-2 flex flex-wrap">
                                @if (isset($note))
                                  @foreach ($note->files as $file)
                              
                                      
                                      <div class="max-w-sm bg-white border border-gray-200 mx-auto my-2 md:m-4 rounded-lg shadow dark:bg-gray-800">
                                          <img id="file_preview2" class="h-64 w-128 object-cover " src="{{ isset($note) ? asset('storage/img/'.$file->file) : 'No hay imagenes' }}" alt="{{ $note->title }}" srcset="">
                                        <div class="p-5 flex flex-col">
                                          
                                            <a class="inline mx-auto px-3 py-2 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                            <form method="post" action="{{route('note.removeImage', $file->id)}}" class="inline">
                                              @csrf 
                                              @method('delete')
                                              <button onclick="return confirm('ok')">Eliminar</button></form></a>
                                            
                                        </div>
                                      </div>
                                  @endforeach
                                @endif
                              </div>
                             
                              <x-input-error class="mt-2" :messages="$errors->get('file')" />
                          </div>
                              @endif --}}

           
                        
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('note.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'">Salir</a>
                        </div>
                    </form>
                    {{-- <h3>Fotos</h3>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                              <tr>
                                  <th scope="col" class="px-6 py-3">
                                      Titulo
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Total
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Ver    
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                            @if (isset($note))
                            @foreach ($note->files as $file)
                            @foreach ($notes as $note)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                              <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                  {{$note->title}}
                              </th>
                              <td class="px-6 py-4">
                                  {{$note->files->count();}}
                              </td>
                              <td class="px-6 py-4">
                                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                              </td>
                          </tr>  
                            @endforeach
                            @endif
                          </tbody>
                      </table>
                  </div> --}}
                  

                </div>
            </div>
            

        </div>
    </div>

    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
    <script>
      $(document).ready(function (e) {
        $('#foto').change(function(){
          let reader = new FileReader();
          reader.onload = (e) => {
            $('#newFoto').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
        });
      });
    </script>
  
</x-app-layout>