<div>
    <div class="d-flex flex-column text-center">
        <div class="p-2">
            <label>Placa:</label>
            <div class="input-group">
                <input type="text" wire:model='cadena'
                    class="form-control text-center @error('cadena') is-invalid @enderror" readonly required>
                @error('pass')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="p-2">
            <label>Contraseña:</label>
            <input type="password" wire:model='pass' class="form-control @error('pass') is-invalid @enderror" value=""
                required>
            @error('pass')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="p-2">
            <label>Archivo:</label>
            <input type="file" wire:model='archivo' class="form-control-file @error('archivo') is-invalid @enderror"
                value="" required>
            @error('archivo')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <hr>
    <a class="btn btn-danger text-white" data-dismiss="modal">Cancelar</a>
    <button wire:click="firmar" class="btn btn-success">Confirmar</button>
</div>
