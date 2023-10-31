<div class="p-1">
    <div class="row">

        <h4 class="small-title">Información principal de la sección</h4>
        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('select_us','Título de sección',['class'=>'form-label']) }}
            {{ Form::text('title_info', $infoWeb->title_info, ['class' => 'form-control' . ($errors->has('title_info') ? ' is-invalid' : ''), 'placeholder' => 'Title info']) }}
            {!! $errors->first('title_info', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('select_us','Información sección',['class'=>'form-label']) }}
            {{ Form::text('select_us', $infoWeb->select_us, ['class' => 'form-control' . ($errors->has('select_us') ? ' is-invalid' : ''), 'placeholder' => 'Select Us']) }}
            {!! $errors->first('select_us', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <h4 class="small-title">Información primera de la división</h4>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('title_first','Título de primera división',['class'=>'form-label']) }}
            {{ Form::text('title_first', $infoWeb->title_first, ['class' => 'form-control' . ($errors->has('title_first') ? ' is-invalid' : ''), 'placeholder' => 'Sell Home']) }}
            {!! $errors->first('title_first', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('sell_home','Texto de primera división',['class'=>'form-label']) }}
            {{ Form::text('sell_home', $infoWeb->sell_home, ['class' => 'form-control' . ($errors->has('sell_home') ? ' is-invalid' : ''), 'placeholder' => 'Sell Home']) }}
            {!! $errors->first('sell_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_first','Primer icono división',['class'=>'form-label']) }}
            {{ Form::text('icon_first', $infoWeb->icon_first, ['class' => 'form-control' . ($errors->has('icon_first') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_first', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <h4 class="small-title">Información segunda de la división</h4>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('title_second','Título de segunda división',['class'=>'form-label']) }}
            {{ Form::text('title_second', $infoWeb->title_second, ['class' => 'form-control' . ($errors->has('title_second') ? ' is-invalid' : ''), 'placeholder' => 'Sell Home']) }}
            {!! $errors->first('title_second', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('rent_home','Texto segunda división',['class'=>'form-label']) }}
            {{ Form::text('rent_home', $infoWeb->rent_home, ['class' => 'form-control' . ($errors->has('rent_home') ? ' is-invalid' : ''), 'placeholder' => 'Rent Home']) }}
            {!! $errors->first('rent_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_second','Segundo icono división',['class'=>'form-label']) }}
            {{ Form::text('icon_second', $infoWeb->icon_second, ['class' => 'form-control' . ($errors->has('icon_second') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_second', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <h4 class="small-title">Información tercera de la división</h4>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('title_thrid','Título de tercera división',['class'=>'form-label']) }}
            {{ Form::text('title_thrid', $infoWeb->title_thrid, ['class' => 'form-control' . ($errors->has('title_thrid') ? ' is-invalid' : ''), 'placeholder' => 'Sell Home']) }}
            {!! $errors->first('title_thrid', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('buy_home','Texto de tercera división',['class'=>'form-label']) }}
            {{ Form::text('buy_home', $infoWeb->buy_home, ['class' => 'form-control' . ($errors->has('buy_home') ? ' is-invalid' : ''), 'placeholder' => 'Buy Home']) }}
            {!! $errors->first('buy_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_thrid','Tercer icono división',['class'=>'form-label']) }}
            {{ Form::text('icon_thrid', $infoWeb->icon_thrid, ['class' => 'form-control' . ($errors->has('icon_thrid') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_thrid', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <h4 class="small-title">Información cuarta de la división</h4>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('title_fourth','Título de cuarta división',['class'=>'form-label']) }}
            {{ Form::text('title_fourth', $infoWeb->title_fourth, ['class' => 'form-control' . ($errors->has('title_fourth') ? ' is-invalid' : ''), 'placeholder' => 'Sell Home']) }}
            {!! $errors->first('title_fourth', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('marketing_free','Texto de cuarta división',['class'=>'form-label']) }}
            {{ Form::text('marketing_free', $infoWeb->marketing_free, ['class' => 'form-control' . ($errors->has('marketing_free') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('marketing_free', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('icon_fourth','Cuarto icono división',['class'=>'form-label']) }}
            {{ Form::text('icon_fourth', $infoWeb->icon_fourth, ['class' => 'form-control' . ($errors->has('icon_fourth') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('icon_fourth', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <p>Para seleccionar tus iconos entrar en esta dirección y copia la sección class <a href="https://icons.getbootstrap.com" target="_blank">Iconos Bootstrap</a>, <a href="https://fontawesome.com/search?q=car&o=r&m=free" target="_blank">Iconos Font Awesome</a></p>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary" type="submit" class="form-submit">Guardar</button>

    </div>
</div>