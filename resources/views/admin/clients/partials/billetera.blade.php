<div class="form-body" id="billetera" style="display: none;">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="h5" for="billetera">Tipo de Billetera <span style="color: red;">*</span></label>
                <select class="form-control {{ $errors->has('billetera') ? ' is-invalid' : '' }}" id="billetera" name="billetera">
                    <option value="">Escoja el tipo de Billetera</option>
                    <option value="BTC - 14MtQUfwFEKVoLd89AtZLSPrN2w73CjsBp">BTC - 14MtQUfwFEKVoLd89AtZLSPrN2w73CjsBp</option>
                    <option value="ETH - 0x06923a8327bdb134183f6d8b597a457b0e35f96d">ETH - 0x06923a8327bdb134183f6d8b597a457b0e35f96d</option>
                    <option value="USDT (TRC20) - TEVLQJvoSLVtya1R5LM5cHYg1p6z5Me7nj">USDT (TRC20) - TEVLQJvoSLVtya1R5LM5cHYg1p6z5Me7nj</option>
                    <option value="LTC - LcLq2xtxT6vKoKMbK3gbVN54wyx1BTSRA5">LTC - LcLq2xtxT6vKoKMbK3gbVN54wyx1BTSRA5</option>
                </select>
                @error('billetera')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="h5" for="amount">Monto <span style="color: red;">*</span></label>
                @if ($client->hosting != NULL)
                    <input type="text" class="form-control @error('amount') is-invalid @enderror"
                    name="amount" placeholder="Ingrese el monto" value="{{$client->hosting->renewal_price}}" readonly>
                @else
                    <input type="text" class="form-control @error('amount') is-invalid @enderror"
                    name="amount" placeholder="Ingrese el monto" value="" readonly>
                @endif
                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="h5" for="name">Hash <span style="color: red;">*</span></label>
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
