<div class="p-1">
    <div class="row">

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('Nombre','Nombre', ['class' => 'form-label']) }}
            {{ Form::text('name', $contacto->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('apellido','Apellido', ['class' => 'form-label']) }}
            {{ Form::text('apellido', $contacto->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('email','Email', ['class' => 'form-label']) }}
            {{ Form::text('email', $contacto->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('telefonoContacto1','Teléfono de contacto 1', ['class' => 'form-label']) }}
            {{ Form::text('telefonoContacto1', $contacto->telefonoContacto1, ['class' => 'form-control' . ($errors->has('telefonoContacto1') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocontacto1']) }}
            {!! $errors->first('telefonoContacto1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('telefonoContacto2','Teléfono de contacto 2', ['class' => 'form-label']) }}
            {{ Form::text('telefonoContacto2', $contacto->telefonoContacto2, ['class' => 'form-control' . ($errors->has('telefonoContacto2') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocontacto2']) }}
            {!! $errors->first('telefonoContacto2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('origen','Origen', ['class' => 'form-label']) }}
            {{ Form::select('origen', ['Pagina web' => 'Pagina web', 'Instagram' => 'Instagram', 'TikTok' => 'TikTok'], $contacto->origen, ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
            {!! $errors->first('origen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('status','Status', ['class' => 'form-label']) }}
            {{-- Form::text('status', $contacto->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) --}}
            <select class="form-control" name="status" id="status">
                <option value="">Seleccione status</option>
                <option value="Interesado" @if($contacto->status == 'Interesado') selected @endif>Interesado</option>
                <option value="No interesado" @if($contacto->status == 'No interesado') selected @endif>No interesado</option>
                <option value="Colega" @if($contacto->status == 'Colega') selected @endif>Colega</option>
                <option value="Constructora" @if($contacto->status == 'Constructora') selected @endif>Constructora</option>
                <option value="Inversionista" @if($contacto->status == 'Inversionista') selected @endif>Inversionista</option>
                <option value="Consulta" @if($contacto->status == 'Consulta') selected @endif>Consulta</option>
                <option value="Propietario" @if($contacto->status == 'Propietario') selected @endif>Propietario</option>
                <option value="Inquilinos" @if($contacto->status == 'Inquilinos') selected @endif>Inquilinos</option>
                <option value="Personales" @if($contacto->status == 'Personales') selected @endif>Personales</option>
                <option value="Deshabilitados" @if($contacto->status == 'Deshabilitados') selected @endif>Deshabilitados</option>
            </select>
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('pais','Pais', ['class' => 'form-label']) }}
            <select class="form-control {{ ($errors->has('pais') ? ' is-invalid' : '') }}" name="pais" id="paisSelect">
                <option value="">Seleccione un pais</option>
                @foreach($paises as $pais)
                <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                @endforeach
            </select> {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('region','Region', ['class' => 'form-label']) }}
            <select class="form-control {{ ($errors->has('region') ? ' is-invalid' : '') }}" id="estadoSelect" name="region">
                <option value="">Seleccione un estado</option>
                <!-- Aquí se cargarán las opciones de los estados en función del país seleccionado -->
            </select> {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('ciudad','Ciudad', ['class' => 'form-label']) }}
            <select class="form-control {{ ($errors->has('ciudad') ? ' is-invalid' : '') }}" id="ciudadSelect" name="ciudad">
                <option value="">Seleccione una ciudad</option>
                <!-- Aquí se cargarán las opciones de las ciudades en función del estado seleccionado -->
            </select> {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 mb-4">
            {{ Form::label('direccion','Direccion', ['class' => 'form-label']) }}
            {{ Form::text('direccion', $contacto->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 mb-4">
            {{ Form::label('observaciones','Observaciones', ['class' => 'form-label']) }}
            {{ Form::textarea('observaciones', $contacto->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="card-footer mt-2">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    // Select dependiente de municipio, hereda de estado
    $(function() {
        $('#paisSelect').on('change', onSelectProjectChange);
    });

    function onSelectProjectChange() {
        var project_id = $(this).val();
        // console.log(project_id);
        if (!project_id)
            $('#estadoSelect').html(html_select);
        $.get('/pais/' + project_id + '/estado', function(data) {
            var html_select = '<option value="">Seleccione un estado</option>'
            for (var i = 0; i < data.length; ++i)
                html_select += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
            $('#estadoSelect').html(html_select);
            // console.log(html_select);
            // console.log($('#estadoSelect').html(html_select));
        });

    }

    $(function() {
        $('#estadoSelect').on('change', onSelectProjectChanges);
    });

    function onSelectProjectChanges() {
        var project_id2 = $(this).val();
        // console.log(project_id2);
        if (!project_id2)
            $('#ciudadSelect').html(html_select2);
        $.get('/estado/' + project_id2 + '/ciudad', function(data) {
            var html_select2 = '<option value="">Seleccione una ciudad</option>'
            for (var a = 0; a < data.length; ++a)
                html_select2 += '<option value="' + data[a].id + '">' + data[a].name + '</option>';
            $('#ciudadSelect').html(html_select2);
            // console.log(html_select2);
            // console.log($('#ciudadSelect').html(html_select2));
        });

    }
</script>