<div class="box box-info padding-1">
    <div class="box-body row">


      
        
         <div class="form-group col-sm-6 mb-4">
            {{ Form::label('select_us','Porque escojernos',['class'=>'mb-4']) }}
            {{ Form::text('select_us', $infoWeb->select_us, ['class' => 'form-control' . ($errors->has('select_us') ? ' is-invalid' : ''), 'placeholder' => 'Select Us']) }}
            {!! $errors->first('select_us', '<div class="invalid-feedback">:message</div>') !!}
        </div>
  <div class="form-group col-sm-6 mb-4">
     {{ Form::label('sell_home','Texto de vender tu casa',['class'=>'mb-4']) }}
            {{ Form::text('sell_home', $infoWeb->sell_home, ['class' => 'form-control' . ($errors->has('sell_home') ? ' is-invalid' : ''), 'placeholder' => 'Sell Home']) }}
            {!! $errors->first('sell_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         <div class="form-group col-sm-6 mb-4">
   {{ Form::label('rent_home','Texto de alquilar tu casa',['class'=>'mb-4']) }}
            {{ Form::text('rent_home', $infoWeb->rent_home, ['class' => 'form-control' . ($errors->has('rent_home') ? ' is-invalid' : ''), 'placeholder' => 'Rent Home']) }}
            {!! $errors->first('rent_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>
         <div class="form-group col-sm-6 mb-4">
       
            {{ Form::label('buy_home','Texto de comprar tu casa',['class'=>'mb-4']) }}
            {{ Form::text('buy_home', $infoWeb->buy_home, ['class' => 'form-control' . ($errors->has('buy_home') ? ' is-invalid' : ''), 'placeholder' => 'Buy Home']) }}
            {!! $errors->first('buy_home', '<div class="invalid-feedback">:message</div>') !!}
        </div>
           <div class="form-group col-sm-6 mb-4">
         {{ Form::label('marketing_free','Texto de free marketin',['class'=>'mb-4']) }}
            {{ Form::text('marketing_free', $infoWeb->marketing_free, ['class' => 'form-control' . ($errors->has('marketing_free') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('marketing_free', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
  <div class="box-footer mt20 offset-4">
      <button class="btn_style" type="submit" class="form-submit">Guardar</button>

    </div>
</div>