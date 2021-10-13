<div class="form-body" id="billetera" style="display: none;">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="h5" for="tipo_billetera">Tipo de Billetera <span style="color: red;">*</span></label>
                <select class="form-control {{ $errors->has('tipo_billetera') ? ' is-invalid' : '' }}" id="tipo_billetera" required name="tipo_billetera">
                    <option value="">Escoja el tipo de Billetera</option>
                    <option value="BTC - 14MtQUfwFEKVoLd89AtZLSPrN2w73CjsBp">BTC - 14MtQUfwFEKVoLd89AtZLSPrN2w73CjsBp</option>
                    <option value="ETH - 0x06923a8327bdb134183f6d8b597a457b0e35f96d">ETH - 0x06923a8327bdb134183f6d8b597a457b0e35f96d</option>
                    <option value="USDT (TRC20) - TEVLQJvoSLVtya1R5LM5cHYg1p6z5Me7nj">USDT (TRC20) - TEVLQJvoSLVtya1R5LM5cHYg1p6z5Me7nj</option>
                    <option value="LTC - LcLq2xtxT6vKoKMbK3gbVN54wyx1BTSRA5">LTC - LcLq2xtxT6vKoKMbK3gbVN54wyx1BTSRA5</option>
                </select>
                <div class="valid-feedback">valido!</div>
                <div class="invalid-feedback">Por favor ingrese el tipo de documento</div>

            </div>

            <div class="form-group">
                <label class="h5" for="monto">Monto</label>
                <input type="text" class="form-control @error('monto') is-invalid @enderror"
                    name="monto" placeholder="Ingrese el monto">
                @error('monto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="h5" for="name">Hash</label>
                <input type="text" class="form-control @error('hash') is-invalid @enderror"
                    name="hash" placeholder="Ingrese el hash de la transacción">
                @error('hash')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>                                                                      

        </div>
    </div>
</div>