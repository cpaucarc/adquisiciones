<div x-data="{close:false}" role="alert" x-show="!close"
     class="z-100 w-6/12 sm:w-4/12 lg:w-3/12 origin-top-right absolute right-0 mt-4 rounded-md shadow-lg">
    <div class="bg-yellow-500 text-white font-bold rounded-t px-4 py-2 flex items-center justify-between">
        {{$title}}

        <span x-on:click="{close = true}" class="cursor-pointer">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </span>

    </div>
    <div class="border border-t-0 border-yellow-400 rounded-b bg-yellow-100 px-4 py-3 text-yellow-700">
        <p>
            {{ $slot }}
        </p>
    </div>
</div>
