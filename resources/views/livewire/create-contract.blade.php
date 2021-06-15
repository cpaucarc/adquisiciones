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
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name"
                                           class="input-form" wire:model.defer="name" autofocus>
                                </div>
                                @error('name')
                                <x-alerts.danger>
                                    <strong>Whoops!</strong> Es necesario colocar la denominación del contrato
                                </x-alerts.danger>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                Descripción del contrato
                                <span class="bg-gray-50 px-3 py-1 rounded-full text-xs text-gray-400 font-normal">
                                        Campo Opcional
                                    </span>
                            </label>
                            <div class="mt-1">
                                    <textarea id="description" name="description" rows="3"
                                              wire:model.defer="description" class="input-form">

                                    </textarea>
                            </div>
                            <p class="mt-1 text-sm text-gray-500">
                                Breve descripción acerca del contrato.
                            </p>
                            @error('description')
                            <x-alerts.danger>
                                <x-slot name="title">
                                    Falta llenar este campo
                                </x-slot>
                                <strong>Whoops!</strong> {{$message}}
                            </x-alerts.danger>
                            @enderror
                        </div>
                        <div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="price" class="block text-sm font-medium text-gray-700">
                                    Cotización del contrato (S/.)
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="number" name="price" id="price"
                                           wire:model.defer="price"
                                           class="input-form" min="0" step="0.01" max="99999999.99">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="due_at" class="block text-sm font-medium text-gray-700">
                                    Fecha de Vencimiento
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="date" name="due_at" id="due_at"
                                           wire:model.defer="due_at" class="input-form">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-3 sm:col-span-2">
                            <label for="line_id" class="block text-sm font-medium text-gray-700">
                                Tipo de Giro
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <select name="line_id" id="line_id" wire:model.defer="line_id"
                                        required
                                        class="input-form">
                                    @if($lines->count())
                                        <option value="0">Seleccione...</option>
                                        @foreach($lines as $line)
                                            <option value="{{$line->id}}">{{$line->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="0">No hay ningun opción</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div>
                            <label for="document" class="block text-sm font-medium text-gray-700">
                                Documento Adjunto
                            </label>
                            <div
                                class="mt-1 px-2 pt-2 pb-0 border-2 border-gray-100 rounded-md border-dashed">
                                {{--                                <input type="file"--}}
                                {{--                                       id="document"--}}
                                {{--                                       class="document"--}}
                                {{--                                       name="document"--}}
                                {{--                                       data-max-file-size="25MB"--}}
                                {{--                                       data-max-files="1"--}}
                                {{--                                       wire:model.defer="document"--}}
                                {{--                                />--}}

                                <input type="file" wire:model.defer="document">
                            </div>
                            <p class="mt-1 text-sm text-gray-500">
                                Se recomienda adjuntar como mínimo un documento
                            </p>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Guardar contrato
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
