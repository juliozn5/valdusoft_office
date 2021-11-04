<div class="form-body" id="billetera" style="display: none;">
    <div class="row">
        <div class="col-12">
           <div class="form-group">
             <label class="h5" for="fee">% de feed <span style="color: red;">*</span></label>
                <input type="text" class="form-control @error('fee') is-invalid @enderror"
                       name="fee" id="fee" placeholder="Ingrese el feed de la transacción" >
                @error('fee')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
           </div> 
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
       </div>
     </div>
</div>
