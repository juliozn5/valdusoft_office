
<div class="form-body" id="billetera" style="display: none;">
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('admin.payments.billetera') }}" enctype="multipart/form-data" required>
               @csrf
               <div class="form-group">
                    <label class="h5" for="fee">% de feed <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('fee') is-invalid @enderror"
                        name="fee" id="fee" placeholder="Ingrese el feed de la transacción" required>
                    @error('fee')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="h5" for="discount_amount">Hash <span style="color: red;">*</span></label>
                    <input type="text" class="form-control @error('discount_amount') is-invalid @enderror"
                        name="discount_amount" id="discount_amount" placeholder="Ingrese el hash de la transacción" required>
                    @error('discount_amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
            </form>
        </div>
    </div>
</div>
