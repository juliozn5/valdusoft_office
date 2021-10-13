<div class="user-chats overflow-auto">
    <div class="chats">
        @foreach($messages as $mensaje)  
            @if($mensaje["usuario_id"] == Auth::user()->id)   
                <div class="chat">
                    <div class="chat-avatar">
                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                            <img src="{{ asset('template/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="avatar" height="40" width="40" />
                        </a>
                    </div>
                    <div class="chat-body">
                        <div class="text-right pr-2 chat-username">
                            {{$mensaje["usuario"]}}
                        </div>
                        <div class="chat-content">
                            <p>{{$mensaje["mensaje"]}}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="chat chat-left">
                    <div class="chat-avatar">
                        <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                            <img src="{{ asset('template/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="avatar" height="40" width="40" />
                        </a>
                    </div>
                    <div class="chat-body">
                        <div class="chat-username pl-2">
                            {{$mensaje["usuario"]}}
                        </div>
                        <div class="chat-content">
                            <p>{{$mensaje["mensaje"]}}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="divider">
            <div class="divider-text">Yesterday</div>
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



            // $('#scrolling').on('click',function()
            $(document).ready(function () {

                $('#chating').scrollTop($('#chating').prop('scrollHeight'));

            });

            // function scrolling()
            // {
            //     //Obtengo el div
            //     var e = document.getElementById('chating');

            //     //Llevo el scroll al fondo
            //     var objDiv = document.getElementById("chating");
            //     objDiv.scrollTop = objDiv.scrollHeight;

            // console.log('sho no fui')

            // }

        </script>
    </div>
