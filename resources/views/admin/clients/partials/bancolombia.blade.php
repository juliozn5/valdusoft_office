<div class="form-body" id="bancolombia" style="display: none;">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="h5" for="name">Nombre</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" value="Estefanny Torrado">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="h5" for="name">Cuenta</label>
                <input type="text" class="form-control @error('cuenta') is-invalid @enderror"
                    name="cuenta" value="91201530453">
                @error('cuenta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="h5" for="name">Tipo de Cuenta</label>
                <input type="text" class="form-control @error('tipo') is-invalid @enderror"
                    name="tipo" value="Ahorro">
                @error('tipo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="h5" for="name">Cedula Ciudadana</label>
                <input type="text" class="form-control @error('cedula') is-invalid @enderror"
                    name="cedula" value="1.148.456.331">
                @error('cedula')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>                                    

            <div class="form-group">
                <label class="h5" for="due_date">Imagen para el Cliente</label>
                <div class="media">
                    <div class="custom-file">
                        <label class="custom-file-label" for="photo"><b>Foto del Cliente</b></label>
                        <input type="file" id="photo"
                            class="custom-file-input @error('photo') is-invalid @enderror"
                            name="photo"
                            onchange="previewFile(this, 'photo_preview')"
                            accept="image/*">
                        @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 text-center">
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