<div class="user-chats overflow-auto">
    <div class="chats">
        @foreach($messages as $mensaje)
            @if ($mensaje["divider"] == true)
                <div class="divider">
                    <div class="divider-text">{{ $mensaje["date"] }}</div>
                </div>
            @else  
                @if($mensaje["user_id"] == Auth::user()->id)   
                    <div class="chat">
                        @if ($mensaje["previous_user"] == false)
                            <div class="chat-avatar">
                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                    <img src="{{ asset('template/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="avatar" height="40" width="40" />
                                </a>
                            </div>
                        @endif
                        <div class="chat-body">
                            <div class="row">
                                @if ($mensaje["previous_user"] == false)
                                    <div class="col-12 text-right pr-3 chat-username">
                                        {{$mensaje["username"]}}
                                    </div>
                                @endif
                                <div class="col-12">
                                    <p class="chat-content">{{$mensaje["message"]}}</p>
                                </div>
                                <div class="col-12 text-right pr-3 chat-date">
                                    {{$mensaje["date"]}}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="chat chat-left">
                        @if ($mensaje["previous_user"] == false)
                            <div class="chat-avatar">
                                <a class="avatar m-0" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                    <img src="{{ asset('template/app-assets/images/portrait/small/avatar-s-1.jpg') }}" alt="avatar" height="40" width="40" />
                                </a>
                            </div>
                        @endif
                        <div class="chat-body">
                            <div class="row">
                                @if ($mensaje["previous_user"] == false)
                                    <div class="col-12 pl-3 chat-username">
                                        {{$mensaje["username"]}}
                                    </div>
                                @endif
                                <div class="col-12">
                                    <p class="chat-content">{{$mensaje["message"]}}</p>
                                </div>
                                <div class="col-12 pl-3 chat-date">
                                    {{$mensaje["date"]}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        @endforeach
        
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('d3a38273350a6ecee9eb', {
                cluster: 'us2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function (data) {
                if (data.proyecto == $("#project_id").val()){
                    window.livewire.emit('mensajeRecibido', data);
                    if (data.id_usuario != $("#user_auth").val()){
                        $("#chat-badge").removeClass('hidden');
                    } 
                }
            });

            //setTimeout(function(){ window.livewire.emit('solicitaUsuario'); }, 100);

            
            $(document).ready(function () {

                $('#chating').scrollTop($('#chating').prop('scrollHeight'));

            });
        </script>
    </div>
</div>
