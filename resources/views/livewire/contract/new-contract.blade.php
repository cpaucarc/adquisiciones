<div>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Contrato</h3>
                <p class="mt-1 text-sm text-gray-500">
                    Consigne en este formulario los datos acerca del contrato que se va a crear.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit.prevent="save" autocomplete="off">
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Nombre/Denominación del contrato
                                </label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name"
                                           class="input-form w-full" wire:model="name" autofocus>
                                </div>
                                @error('name')
                                <span class="text-red-500 text-xs">
                                    Es necesario colocar la denominación del contrato.
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Descripción del contrato
                            </label>
                            <div class="mt-1">
                                <textarea id="description" name="description" rows="3"
                                          wire:model="description" class="input-form w-full">
                                </textarea>
                            </div>
                            @error('description')
                            <span class="text-red-500 text-xs">
                                Es necesario colocar una breve descripción acerca del contrato
                                (menos de 1000 caracteres).
                            </span>
                            @enderror
                        </div>
                        <div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="price" class="block text-sm font-medium text-gray-700">
                                    Cotización del contrato (S/.)
                                </label>
                                <div class="mt-1">
                                    <input type="number" name="price" id="price"
                                           wire:model="price" class="input-form w-full" min="0" step="0.01"
                                           max="99999999.99">
                                </div>
                                @error('price')
                                <span class="text-red-500 text-xs">
                                    Es necesario especificar la cotización del contrato.
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="due_date_at" class="block text-sm font-medium text-gray-700">
                                    Fecha de Vencimiento
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="date" name="due_date_at" id="due_date_at"
                                           wire:model="due_date_at" class="input-form w-full">
                                </div>
                                @error('due_date_at')
                                <span class="text-red-500 text-xs">
                                    Es necesario especificar la fecha hasta cuando debe verificarse.
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="line_id" class="block text-sm font-medium text-gray-700">
                                Tipo de Giro
                            </label>
                            <div class="mt-1">
                                <select name="line_id" id="line_id" wire:model="line_id"
                                        required class="input-form w-full">
                                    @if($lines->count())
                                        <option value="0">Seleccione...</option>
                                        @foreach($lines as $line)
                                            <option value="{{$line->id}}" class="text-gray-700">{{$line->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="0">No hay ningun opción</option>
                                    @endif
                                </select>
                            </div>
                            @error('line_id')
                            <span class="text-red-500 text-xs">
                                Es necesario indicar el tipo de giro.
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label for="document" class="block text-sm font-medium text-gray-700">
                                Documento Adjunto
                            </label>
                            <div class="mt-1">
                                <input type="file" wire:model="document" id="document"
                                       class="input-form w-full cursor-pointer border-1 border-gray-400 border-dashed rounded-md text-sm  py-4">
                                @error('document')
                                <span class="text-red-500 text-xs">
                                    Es necesario adjuntar el documento de especificación del contrato.
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="bg-gray-50 mx-0 p-4 rounded-lg">
                            <fieldset>
                                <div>
                                    <legend class="text-base font-medium text-gray-700">Enviar a:</legend>
                                    <p class="text-sm text-gray-400">
                                        Una vez que se ha verificado el documento, y de acuerdo a la conformidad
                                        elija a que oficina se debe enviar este documento.
                                    </p>
                                </div>
                                <div class="mt-4 space-y-2" x-data="{ showFeedback:false }">
                                    <div class="flex items-center mb-4">
                                        <input id="unad" name="destination" type="radio" checked
                                               x-on:click="{ showFeedback = false }"
                                               class="active:ring-indigo-600 focus:ring-indigo-600 h-5 w-5 text-indigo-600 border-gray-300">
                                        <label for="unad" x-on:click="{ showFeedback = false }"
                                               class="ml-3 block text-sm font-medium text-gray-700">
                                            Unidad de Adquisiciones
                                            <span
                                                class="bg-green-100 px-3 py-1 text-xs rounded-full text-green-900 w-full">
                                                Es conforme
                                            </span>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="dga" name="destination" type="radio" wire:model.defer="dga"
                                               x-on:click="{ showFeedback = true }"
                                               class="focus:ring-indigo-600 h-5 w-5 text-indigo-600 border-gray-300">
                                        <label for="dga" x-on:click="{ showFeedback = true }"
                                               class="ml-3 block text-sm font-medium text-gray-700">
                                            Dirección General de Administración
                                            <span class="bg-red-100 px-3 py-1 text-xs rounded-full text-red-900 w-full">
                                                No es conforme
                                            </span>
                                        </label>
                                    </div>
                                    <div class="pl-12" x-show="showFeedback">
                                        <div class="mt-1">
                                            <textarea id="feedback" name="feedback" rows="3" class="input-form w-full"
                                                      wire:model="feedback"
                                                      placeholder="Coloque un mensaje del porque no es conforme">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <div x-data="{close:false}">
                            <button type="submit" x-on:click="{close = false}"
                                    class="btn-primary">
                                Guardar contrato
                            </button>
                            @if(strlen($response) > 0)
                                <x-alerts.info>
                                    @slot('title')
                                        La información se guardó con exito
                                    @endslot
                                    <div class="flex items-center justify-between my-2">
                                        <span x-on:click="{close = true}"
                                              class="cursor-pointer bg-green-100 px-3 py-1 rounded-lg hover:bg-green-200">
                                            Continuar aqui
                                        </span>
                                        <a href="{{ route('contratos') }}"
                                           class="bg-green-100 px-3 py-1 rounded-lg hover:bg-green-200">
                                            Ver todos
                                        </a>
                                        <a href="{{route('contratos.mostrar', $response)}}"
                                           class="bg-green-100 px-3 py-1 rounded-lg hover:bg-green-200">
                                            Ver este
                                        </a>
                                    </div>
                                </x-alerts.info>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
