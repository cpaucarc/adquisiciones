<div role="alert" class="z-100 w-6/12 sm:w-4/12 lg:w-3/12 origin-top-right absolute right-0 mt-4 rounded-md shadow-lg">
    <div class="bg-yellow-500 text-white font-bold rounded-t px-4 py-2">
        {{$title}}
    </div>
    <div class="border border-t-0 border-yellow-400 rounded-b bg-yellow-100 px-4 py-3 text-yellow-700">
        <p>
            {{ $slot }}
        </p>
    </div>
</div>
