<div class="p-1">
    <div class="row">

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('select_us','Titulo de sección',['class'=>'mb-4']) }}
            {{ Form::text('title_info', $infoWeb->title_info, ['class' => 'form-control' . ($errors->has('title_info') ? ' is-invalid' : ''), 'placeholder' => 'Title info']) }}
            {!! $errors->first('title_info', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('select_us','Información sección',['class'=>'mb-4']) }}
            {{ Form::text('select_us', $infoWeb->select_us, ['class' => 'form-control' . ($errors->has('select_us') ? ' is-invalid' : ''), 'placeholder' => 'Select Us']) }}
            {!! $errors->first('select_us', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('sell_home','Primera sección',['class'=>'mb-4']) }}
            {{ Form::text('sell_home', $infoWeb->sell_home, ['class' => 'form-control' . ($errors->has('sell_home') ? ' is-invalid' : ''), 'placeholder' => 'Sell Home']) }}
            {!! $errors->first('sell_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('rent_home','Segunda sección',['class'=>'mb-4']) }}
            {{ Form::text('rent_home', $infoWeb->rent_home, ['class' => 'form-control' . ($errors->has('rent_home') ? ' is-invalid' : ''), 'placeholder' => 'Rent Home']) }}
            {!! $errors->first('rent_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">

            {{ Form::label('buy_home','Tercera sección',['class'=>'mb-4']) }}
            {{ Form::text('buy_home', $infoWeb->buy_home, ['class' => 'form-control' . ($errors->has('buy_home') ? ' is-invalid' : ''), 'placeholder' => 'Buy Home']) }}
            {!! $errors->first('buy_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('marketing_free','Cuarta sección',['class'=>'mb-4']) }}
            {{ Form::text('marketing_free', $infoWeb->marketing_free, ['class' => 'form-control' . ($errors->has('marketing_free') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('marketing_free', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_first','primer icono sección',['class'=>'mb-4']) }}
            {{ Form::text('icon_first', $infoWeb->icon_first, ['class' => 'form-control' . ($errors->has('icon_first') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_first', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_second','Segundo icono sección',['class'=>'mb-4']) }}
            {{ Form::text('icon_second', $infoWeb->icon_second, ['class' => 'form-control' . ($errors->has('icon_second') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_second', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_thrid','Tercer icono sección',['class'=>'mb-4']) }}
            {{ Form::text('icon_thrid', $infoWeb->icon_thrid, ['class' => 'form-control' . ($errors->has('icon_thrid') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_thrid', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_fourth','Cuarto icono sección',['class'=>'mb-4']) }}
            {{ Form::text('icon_fourth', $infoWeb->icon_fourth, ['class' => 'form-control' . ($errors->has('icon_fourth') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_fourth', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <p>Para seleccionar tus iconos entrar en esta dirección y copia la sección class <a href="https://icons.getbootstrap.com" target="_blank">Iconos Bootstrap</a></p>
    </div>
    <div class="mt-4">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>

    </div>
</div>