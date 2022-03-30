



<div class="modal  fade bd-example-modal-sm" id="exampleModalSuspender{{$key}}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <form action="{{ route('accion-empleado') }}" method="POST">
                        @csrf
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Suspender Empleado</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    @if($employeeSuspendido->status == '1')
                                    <h2 class="text-center">Seguro quieres supender a {{$employeeSuspendido->name}} ? </h2>
                                    <input type="hidden" name="userid" value="{{$employeeSuspendido->id}}">
                                    @endif

                                     @if($employeeSuspendido->status == '0')
                                     <h2 class="text-center">Seguro quieres Activar a {{$employeeSuspendido->name}} ? </h2>
                                    <input type="hidden" name="userid" value="{{$employeeSuspendido->id}}">
                                     @endif

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">

                                 @if($employeeSuspendido->status == '1')
                                <input type="hidden" name="suspender" value="si">
                                 @endif

                                 @if($employeeSuspendido->status == '0')
                                  <input type="hidden" name="activar" value="si">
                                 @endif
                                Si
                                </button>
                            </div>
                            </div>
                        </form>
                        </div>
                        </div>
