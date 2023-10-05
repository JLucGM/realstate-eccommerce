<div class="p-2">
    <div class="box-body row">
        <div class="form-group col-12 col-sm-6">
            <label for="moneda" class="form-label">Monedas</label>
            <select class="form-control" name="moneda" id="moneda">
                <option value="{{ $settingGeneral->moneda }}">{{ $settingGeneral->monedaSetting->tipo.' - '.$settingGeneral->monedaSetting->denominacion }}</option>
                @foreach($monedas as $moneda)
                <option value="{{ $moneda->id }}">{{ $moneda->tipo.' - '.$moneda->denominacion }}</option>
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
        <div class="col-12 col-md-3">
            <label class="form-label">Primera sección</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="status_section_one" value="1" id="status_section_one" {{ $settingGeneral->status_section_one ? 'checked' : '' }}>
                <label class="form-check-label" for="status_section_one">Activar</label>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <label class="form-label">Segunda sección</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="status_section_two" value="1" id="status_section_two" {{ $settingGeneral->status_section_two ? 'checked' : '' }}>
                <label class="form-check-label" for="status_section_two">Activar</label>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <label class="form-label">Tercera sección</label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="status_section_three" value="1" id="status_section_three" {{ $settingGeneral->status_section_three ? 'checked' : '' }}>
                <label class="form-check-label" for="status_section_three">Activar</label>
            </div>
        </div>
    </div>

    <div class="">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>

</div>