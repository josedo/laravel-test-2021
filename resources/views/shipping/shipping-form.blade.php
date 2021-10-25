<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shipping') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container mt-2 mb-2">
                    <h1 class="text-center font-semibold text-gray-900 text-xl pb-3"> Shipping </h1>
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-start-2 col-span-4">
                            <form method="POST" action="{{ route('shippings.store') }}">
                                @csrf
                                <div class="grid grid-cols-1 gap-0">
                                    <div class="m-2">
                                        <label for="name" class="text-gray-500">Nombre</label>
                                        <input
                                            placeholder="Nombre descriptivo del paquete a enviar..."
                                            type="text"
                                            id="name"
                                            name="name"
                                            class="rounded-md w-full"
                                            value="{{ old('name') }}"
                                        />
                                        @error("name") <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="m-2">
                                        <label for="height" class="text-gray-500">Alto(cm)</label>
                                        <input
                                            placeholder="Altura del paquete a enviar..."
                                            type="text"
                                            id="height"
                                            name="height"
                                            class="rounded-md w-full"
                                            value="{{ old('height') }}"
                                        />
                                        @error("height") <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>

                                    <div class="m-2">
                                        <label for="width" class="text-gray-500">Ancho(cm)</label>
                                        <input
                                            placeholder="Ancho del paquete a enviar..."
                                            type="text"
                                            id="width"
                                            name="width"
                                            class="rounded-md w-full"
                                            value="{{ old('width') }}"
                                        />
                                        @error("width") <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="m-2">
                                        <label for="weight" class="text-gray-500">Peso(kg)</label>
                                        <input
                                            placeholder="Peso del paquete a enviar..."
                                            type="text"
                                            id="weight"
                                            name="weight"
                                            class="rounded-md w-full"
                                            value="{{ old('weight') }}"
                                        />
                                        @error("weight") <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="m-2">
                                        <label for="width" class="text-gray-500">Destino</label>
                                        <select
                                            placeholder="Destino del paquete a enviar..."
                                            type="text"
                                            id="destination"
                                            name="destination"
                                            class="rounded-md w-full"
                                        />
                                            <option value="1">Sucursal EEUU</option>
                                            <option value="2">Sucursal X región Chile</option>
                                        <select/>
                                        @error("destination") <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                                    </div>
                                    <button
                                        type="submit"
                                        class="justify-center py-1 px-2 border border-transparent shadow-sm font-bold
                                        rounded-md text-sm text-white bg-blue-500 hover:bg-blue-700 focus:outline-none
                                        focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 mt-2 w-20"
                                    >
                                        Enviar
                                    </button>
                                </div>
                            </form>
                            @if ($shipmentSuccess)
                                <div class="mt-3 p-3 rounded-md border boreder-red-500 bg-green-100 grid grid-cols-6 gap-0">
                                    <div class="col-span-6 mb-3">
                                        <h3 class="text-center font-bold">Envío ingresado correctamente!</h3>
                                    </div>
                                    <div class="col-span-4 grid grid-cols-3 gap-0">
                                        {{-- company --}}
                                        <div class="font-semibold">
                                            Metodo de envío:
                                        </div>
                                        <div class="col-span-2">
                                            {{ $shipmentSuccess['company'] }}
                                        </div>
                                        {{-- UUID --}}
                                        <div class="font-semibold">
                                            UUID:
                                        </div>
                                        <div class="col-span-2">
                                            {{ $shipmentSuccess['uuid'] }}
                                        </div>
                                        {{-- name of shipment --}}
                                        <div class="font-semibold">
                                            Nombre envío:
                                        </div>
                                        <div class="col-span-2">
                                            {{ $shipmentSuccess['name'] }}
                                        </div>
                                        {{-- height--}}
                                        <div class="font-semibold">
                                            Alto(cm):
                                        </div>
                                        <div class="col-span-2">
                                            {{ $shipmentSuccess['height'] }}
                                        </div>
                                        {{-- width--}}
                                        <div class="font-semibold">
                                            Ancho(cm):
                                        </div>
                                        <div class="col-span-2">
                                            {{ $shipmentSuccess['width'] }}
                                        </div>
                                        {{-- weight--}}
                                        <div class="font-semibold">
                                            Peso(cm):
                                        </div>
                                        <div class="col-span-2">
                                            {{ $shipmentSuccess['weight'] }}
                                        </div>
                                        {{-- destination--}}
                                        <div class="font-semibold">
                                            Sucursal de destino:
                                        </div>
                                        <div class="col-span-2">
                                            {{ $shipmentSuccess['destination'] }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
