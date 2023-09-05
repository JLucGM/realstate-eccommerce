<div class="p-2">
    <div class="box-body row">
        <div class="form-group col-12 col-sm-6">
            <label for="moneda" class="form-label">Monedas</label>
            <select class="form-control" name="moneda" id="moneda">
                @foreach($monedas as $moneda)
                <option value="{{ $moneda->tipo }}">{{ $moneda->tipo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-12 col-sm-6" id="c_logo">

            <div class="mb-3">
                <label for="formFile" class="form-label">Logo de la empresa</label>
                <input class="form-control" name="logo_empresa" type="file" id="image">
                @if ($settingGeneral->logo_empresa)
                <p>Archivo actual: {{ $settingGeneral->logo_empresa }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="">

        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>

</div>