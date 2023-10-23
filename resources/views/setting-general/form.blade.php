<div class="p-2">
    <div class="box-body row">

        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">name</label>
                <input value="{{ $settingGeneral->name }}" class="form-control" name="name" type="text">
            </div>
        </div>

        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">telefono</label>
                <input value="{{ $settingGeneral->telefono }}" class="form-control" name="telefono" type="text">
            </div>
        </div>

        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">email</label>
                <input value="{{ $settingGeneral->email }}" class="form-control" name="email" type="text">
            </div>
        </div>
        
        <div class="form-group col-12 col-sm-6">
            <label for="moneda" class="form-label">Monedas</label>
            <select class="form-control" name="moneda" id="moneda">
                <option value="{{ $settingGeneral->moneda }}">{{ $settingGeneral->monedaSetting->tipo.' - '.$settingGeneral->monedaSetting->denominacion }}</option>
                @foreach($monedas as $moneda)
                <option value="{{ $moneda->id }}">{{ $moneda->tipo.' - '.$moneda->denominacion }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">direccion</label>
                <textarea name="direccion" class="form-control" rows="2">{{ $settingGeneral->direccion }}</textarea>
            </div>
        </div>

        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">description</label>
                <textarea name="description" class="form-control" rows="2">{{ $settingGeneral->description }}</textarea>
            </div>
        </div>
        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">facebook</label>
                <input value="{{ $settingGeneral->facebook }}" class="form-control" name="facebook" type="text">
            </div>
        </div>
        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">twitter</label>
                <input value="{{ $settingGeneral->twitter }}" class="form-control" name="twitter" type="text">
            </div>
        </div>
        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">instagram</label>
                <input value="{{ $settingGeneral->instagram }}" class="form-control" name="instagram" type="text">
            </div>
        </div>
        <div class="form-group col-12 col-sm-6" >
            <div class="mb-3">
                <label for="form-control" class="form-label">linkedin</label>
                <input value="{{ $settingGeneral->linkedin }}" class="form-control" name="linkedin" type="text">
            </div>
        </div>


        <div class="form-group col-12 col-sm-6" >
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