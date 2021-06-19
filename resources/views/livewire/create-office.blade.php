<div>
    <form wire:submit.prevent="save">
        <input class="input-form" type="text" required placeholder="Office" name="office" id="office"
               wire:model.defer="office">
        {{$office}}
        <br>
        <br>
        <input class="input-form" type="text" placeholder="Day" name="day" id="day" wire:model.defer="execution_days">
        <br>

        <br>
        <button type="submit">Guradar</button>
    </form>

    <div x-data="{close:false}">


        @if(strlen($info) > 0)
            <x-alerts.info>
                @slot('title')
                    La información se guardó con exito
                @endslot
                <div class="flex items-center justify-between my-2">
                    <span x-on:click="{close = true}"
                          class="cursor-pointer bg-green-100 px-3 py-1 rounded-lg hover:bg-green-200">
                        Continuar aqui
                    </span>
                    <a href="#"
                       class="bg-green-100 px-3 py-1 rounded-lg hover:bg-green-200">
                        Ver todos
                    </a>
                    <a href="{{route('contratos.mostrar', $info)}}"
                       class="bg-green-100 px-3 py-1 rounded-lg hover:bg-green-200">
                        Ver este
                    </a>
                </div>


            </x-alerts.info>
        @endif

        <button x-on:click="{close = false}" wire:click="$emit('showMessage')"
                class="bg-green-600 py-2 px-4 my-4 rounded-md">
            Click Me
        </button>
    </div>

    {{--    @if (session()->has('message'))--}}
    {{--        <x-alerts.info>--}}
    {{--            @slot('title')--}}
    {{--                Mensaje--}}
    {{--            @endslot--}}
    {{--            {{ session('message') }}--}}
    {{--        </x-alerts.info>--}}
    {{--    @endif--}}

</div>
