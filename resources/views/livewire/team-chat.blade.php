<div class="container mt-2 mb-2">
    <h1 class="text-center font-semibold text-gray-900 text-xl pb-3"> Chat de equipo </h1>
    <div class="grid grid-cols-6 gap-4">
        <div class="col-start-2 col-span-4 bg-white shadow-lg rounded-md px-10 py-10 border">
            <div class="grid grid-flow-row auto-rows-max">
                @foreach ($messages as $message)
                    @php
                        $isCurrenUser = Auth::user()->id === $message['userId'];
                    @endphp
                    <div  @class([
                            'flex',
                            'justify-end' => $isCurrenUser
                        ])
                    >
                        <div
                            @class([
                                'rounded-b-lg',
                                'rounded-tr-lg',
                                'bg-green-100' => $isCurrenUser,
                                'bg-gray-100' => !$isCurrenUser,
                                'p-3',
                                'm-3',
                                'min-w-32'
                            ]);
                        >
                            <div class="flex flex-col">
                                <span class="text-sm text-gray-500"> {{ $message['userName'] }} </span>
                                <span> {{ $message['message'] }} </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-start-2 col-span-4">
            <form wire:submit.prevent="sendMessage">
                <div class="grid grid-cols-1 gap-0">
                    <input
                        placeholder="Ingresa tu mensaje..."
                        type="text"
                        id="message"
                        name="message"
                        class="rounded-md w-full"
                        wire:model="message"
                    />
                    @error("message") <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
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
        </div>
    </div>
</div>

<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = false;
    var pusher = new Pusher('4d16828715a88164a4b4', {
        cluster: 'us2'
    });
    var channel = pusher.subscribe('chat-channel');
    channel.bind('chat-event', function(data) {
        window.livewire.emit('messageReceived', data);
    });
</script>
