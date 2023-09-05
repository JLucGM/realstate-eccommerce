<div class="box box-info padding-1">
    <div class="box-body row">



        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('Nombre','Nombre',['class'=>'mb-4']) }}
            {{ Form::text('name', $contacto->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('apellido','Apellido',['class'=>'mb-4']) }}
            {{ Form::text('apellido', $contacto->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('email','Email',['class'=>'mb-4']) }}
            {{ Form::text('email', $contacto->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('telefonoContacto1','Teléfono de contacto 1',['class'=>'mb-4']) }}
            {{ Form::text('telefonoContacto1', $contacto->telefonoContacto1, ['class' => 'form-control' . ($errors->has('telefonoContacto1') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocontacto1']) }}
            {!! $errors->first('telefonoContacto1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('telefonoContacto2','Teléfono de contacto 2',['class'=>'mb-4']) }}
            {{ Form::text('telefonoContacto2', $contacto->telefonoContacto2, ['class' => 'form-control' . ($errors->has('telefonoContacto2') ? ' is-invalid' : ''), 'placeholder' => 'Telefonocontacto2']) }}
            {!! $errors->first('telefonoContacto2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('origen','Origen',['class'=>'mb-4']) }}
            {{ Form::text('origen', $contacto->origen, ['class' => 'form-control' . ($errors->has('origen') ? ' is-invalid' : ''), 'placeholder' => 'Origen']) }}
            {!! $errors->first('origen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('status','Estatus',['class'=>'mb-4']) }}
            {{-- Form::text('status', $contacto->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Status']) --}}
            <select class="form-control" name="status" id="status">

                <option value="{{$contacto->status}}">{{$contacto->status}}</option>
                <option value="Interesado">Interesado</option>
                <option value="No interesado">No interesado</option>
                <option value="Colega">Colega</option>
                <option value="Constructora">Constructora</option>
                <option value="Inversionista">Inversionista</option>
                <option value="Consulta">Consulta</option>
                <option value="Propietario">Propietario</option>
                <option value="Inquilinos">Inquilinos</option>
                <option value="Personales">Personales</option>
                <option value="Deshabilitados">Deshabilitados</option>
            </select>
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('pais','Pais',['class'=>'mb-4']) }}
            {{ Form::text('pais', $contacto->pais, ['class' => 'form-control' . ($errors->has('pais') ? ' is-invalid' : ''), 'placeholder' => 'Pais']) }}
            {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('region','Region',['class'=>'mb-4']) }}
            {{ Form::text('region', $contacto->region, ['class' => 'form-control' . ($errors->has('region') ? ' is-invalid' : ''), 'placeholder' => 'Region']) }}
            {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('ciudad','Ciudad',['class'=>'mb-4']) }}
            {{ Form::text('ciudad', $contacto->ciudad, ['class' => 'form-control' . ($errors->has('ciudad') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad']) }}
            {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('direccion','Direccion',['class'=>'mb-4']) }}
            {{ Form::text('direccion', $contacto->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-sm-6 mb-4">
            {{ Form::label('observaciones','Observaciones',['class'=>'mb-4']) }}
            {{ Form::text('observaciones', $contacto->observaciones, ['class' => 'form-control' . ($errors->has('observaciones') ? ' is-invalid' : ''), 'placeholder' => 'Observaciones']) }}
            {!! $errors->first('observaciones', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>
    </div>
</div>