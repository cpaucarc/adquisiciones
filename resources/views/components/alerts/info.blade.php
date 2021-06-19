<div role="alert" x-show="!close"
     class="z-100 w-10/12 md:w-6/12 lg:w-3/12 origin-top-right absolute right-2 bottom-8 rounded-md shadow-lg">

    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-2" role="alert">
        <div class="font-bold py-2 flex items-center justify-between">
            {{$title}}
            <span x-on:click="{close = true}" class="cursor-pointer">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </span>
        </div>
        <p>
            {{ $slot }}
        </p>
    </div>
</div>



