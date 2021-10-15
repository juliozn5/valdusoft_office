<div class="form-body" id="bancolombia" style="display: none;">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="h5" for="name">Nombre</label>
                <input type="text" class="form-control" value="Estefanny Torrado" readonly>
            </div>

            <div class="form-group">
                <label class="h5" for="name">Cuenta</label>
                <input type="text" class="form-control" value="91201530453" readonly>               
            </div>

            <div class="form-group">
                <label class="h5" for="name">Tipo de Cuenta</label>
                <input type="text" class="form-control" value="Ahorro" readonly>               
            </div>

            <div class="form-group">
                <label class="h5" for="name">Cedula Ciudadana</label>
                <input type="text" class="form-control" value="1.148.456.331" readonly>
            </div>                                    

            <div class="form-group">
                <label class="h5" for="due_date">Imagen del Comprobante <span style="color: red;">*</span></label>
                <div class="media">
                    <div class="custom-file">
                        <label class="custom-file-label" for="photo"><b>Clic para seleccionar una imagen</b></label>
                        <input type="file" id="comprobante"
                            class="custom-file-input @error('comprobante') is-invalid @enderror"
                            name="comprobante"
                            onchange="previewFile(this, 'photo_preview')"
                            accept="image/*">

                        @error('comprobante')                        
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                @if (isset($client->photo))
                <img id="photo_preview" class="rounded" style="object-fit: cover;"
                    width="140px" height="100px"
                    src="{{ asset('storage/' . $client->photo) }}" />
                @else
                <img id="photo_preview" class="rounded" style="object-fit: cover;"
                    width="140px" height="100px"
                    src="{{ asset('images/valdusoft/valdusoft.png') }}" />
                @endif
            </div>                                    

        </div>
    </div>
</div>