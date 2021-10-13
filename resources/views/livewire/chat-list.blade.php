<div class="user-chats overflow-auto">
    <div class="chats" style="overflow-y: scroll; height:400px;" id="chating">
        @foreach($messages as $mensaje)
        @if($mensaje["recibido"])
        <div class="chat">
            @else
            <div class="chat chat-left">
                @endif
                <div class="chat-avatar">
                    <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title=""
                        data-original-title="">
                        <img src="{{ asset('template/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="avatar"
                            height="40" width="40" />
                    </a>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <p>{{$mensaje["mensaje"]}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="divider">
                <div class="divider-text">Yesterday</div>
            </div>
        </div>

        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('d3a38273350a6ecee9eb', {
                cluster: 'us2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function (data) {
                //alert(JSON.stringify(data));
                window.livewire.emit('mensajeRecibido', data);
            });

            //setTimeout(function(){ window.livewire.emit('solicitaUsuario'); }, 100);

            
            $(document).ready(function () {

                $('#chating').scrollTop($('#chating').prop('scrollHeight'));

            });
        </script>
    </div>
