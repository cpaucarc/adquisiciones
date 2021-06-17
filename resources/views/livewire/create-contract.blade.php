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
                                <x-alerts.danger>
                                    <strong>Whoops!</strong> Es necesario colocar la denominación del contrato.
                                </x-alerts.danger>
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
                            <x-alerts.danger>
                                <strong>Whoops!</strong> Es necesario colocar una breve descripción acerca del contrato
                                (menos de 1000 caracteres).
                            </x-alerts.danger>
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
                                <x-alerts.danger>
                                    <strong>Whoops!</strong> Es necesario especificar la cotización del contrato.
                                </x-alerts.danger>
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
                                <x-alerts.danger>
                                    <strong>Whoops!</strong> Es necesario especificar la fecha hasta cuando debe
                                    verificarse.
                                </x-alerts.danger>
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
                            <x-alerts.danger>
                                <strong>Whoops!</strong> Es necesario indicar el tipo de giro.
                            </x-alerts.danger>
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
                                <x-alerts.danger>
                                    <strong>Whoops!</strong> Es necesario adjuntar el documento de especificación del
                                    contrato.
                                </x-alerts.danger>
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
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-center">
                                        <input id="unad" name="destination" type="radio" checked
                                               class="active:ring-indigo-600 focus:ring-indigo-600 h-5 w-5 text-indigo-600 border-gray-300">
                                        <label for="unad"
                                               class="ml-3 block text-sm font-medium text-gray-700">
                                            Unidad de Adquisiciones
                                            <span class="bg-green-100 px-3 py-1 text-xs rounded-full text-green-900">
                                                Es conforme
                                            </span>
                                        </label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="dga" name="destination" type="radio" wire:model.defer="dga"
                                               class="focus:ring-indigo-600 h-5 w-5 text-indigo-600 border-gray-300">
                                        <label for="dga"
                                               class="ml-3 block text-sm font-medium text-gray-700">
                                            Dirección General de Administración
                                            <span class="bg-red-100 px-3 py-1 text-xs rounded-full text-red-900">
                                                No es conforme
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                                class="btn-primary">
                            Guardar contrato
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
