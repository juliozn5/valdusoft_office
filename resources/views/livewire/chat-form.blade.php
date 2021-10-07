<div class="chat-app-form">
    <form class="chat-app-input" action="javascript:void(0);">    
        <div class="row">
            <div class="col-9">
                <input type="text" id="mensaje" class="form-control message mr-1" wire:model="message" wire:keydown.enter="enviarMensaje">
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-info send" wire:click="enviarMensaje" wire:loading.attr="disabled" wire:offline.attr="disabled">
                    <i class="fa fa-paper-plane-o d-lg-none"></i> 
                    <span class="d-none d-lg-block">Enviar</span>
                </button>
            </div>
            @error("message") 
                <small class="text-danger">{{ $message }}</small> 
            @enderror
        </div>
    </form>

    <div wire:offline class="alert alert-danger text-center">
        <strong>Se ha perdido la conexión a Internet</strong>
    </div>


    <script>
        // Esto lo recibimos en JS cuando lo emite el componente
        // El evento "enviadoOK"
        $( document ).ready(function() {
            window.livewire.on('enviadoOK', function () {
                /*$("#avisoSuccess").fadeIn("slow");                
                setTimeout(function(){ $("#avisoSuccess").fadeOut("slow"); }, 3000);   */                             
            });
        });
    </script>
</div>