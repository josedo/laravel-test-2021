<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daily Meeting') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="m-4 md:m-8 xl:m-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach ( $dailys as $daily)
                <div @class([
                    'bg-white',
                    'ring-2',
                    'ring-green-500' => !$daily->blocking,
                    'ring-red-500' => $daily->blocking,
                    'overflow-hidden',
                    'shadow-xl',
                    'rounded-md',
                    'p-4'
                ])">
                    {{-- <livewire:team-chat /> --}}
                    <div class="text-center font-bold uppercase">
                        {{ $daily->user->name }}
                    </div>
                    <div class="divide-y-2 divide-yellow-500">
                        <div class="py-2">
                            &#127881 Done:
                            <p> {{ $daily->done }} </p>
                        </div>
                        <div class="py-2">
                            &#129299 Doing:
                            <p> {{ $daily->doing }} </p>
                        </div>
                        <div class="py-2">
                            &#129301 Blocking:
                            <p> {{ $daily->blocking }} </p>
                        </div>
                        <div class="py-2">
                            &#9200 TODO:
                            <p> {{ $daily->todo }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
