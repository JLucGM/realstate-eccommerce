<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('mensaje') }}
            {{ Form::text('mensaje', $ticketChat->mensaje, ['class' => 'form-control' . ($errors->has('mensaje') ? ' is-invalid' : ''), 'placeholder' => 'Mensaje']) }}
            {!! $errors->first('mensaje', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sender_id') }}
            {{ Form::text('sender_id', $ticketChat->sender_id, ['class' => 'form-control' . ($errors->has('sender_id') ? ' is-invalid' : ''), 'placeholder' => 'Sender Id']) }}
            {!! $errors->first('sender_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('receiver_id') }}
            {{ Form::text('receiver_id', $ticketChat->receiver_id, ['class' => 'form-control' . ($errors->has('receiver_id') ? ' is-invalid' : ''), 'placeholder' => 'Receiver Id']) }}
            {!! $errors->first('receiver_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('mensajes_soporte_id') }}
            {{ Form::text('mensajes_soporte_id', $ticketChat->mensajes_soporte_id, ['class' => 'form-control' . ($errors->has('mensajes_soporte_id') ? ' is-invalid' : ''), 'placeholder' => 'Mensajes Soporte Id']) }}
            {!! $errors->first('mensajes_soporte_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>