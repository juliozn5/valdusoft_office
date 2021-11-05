<div class="form-body" id="billetera" style="display: none;">
    <div class="row">
        <div class="col-12">
           <div class="form-group">
                <label class="h5" for="discount_amount">Hash <span style="color: red;">*</span></label>
                <input type="text" class="form-control @error('discount_amount') is-invalid @enderror"
                name="discount_amount" id="discount_amount" placeholder="Ingrese el hash de la transacción" >
                @error('discount_amount')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>s
                @enderror
           </div>
           <input type="hidden" id="payment_method" name="payment_method" value="Crypto">
          </div>                                  
       </div>
     </div>
</div>
