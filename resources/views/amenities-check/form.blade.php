<div class="p-2">
    <div class=" row">
        
       <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('name','Nombre',['class'=>'mb-1']) }}
            {{ Form::text('name', $amenitiesCheck->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>

          <div class="form-group col-12 col-md-6 mb-4">
            {{ Form::label('amenities_id','Categoria Comodidad',['class'=>'mb-1'])  }}
            {{ Form::select('amenities_id',$amenities, $amenitiesCheck->amenities_id,['class' => 'form-control' . ($errors->has('amenities_id') ? ' is-invalid' : ''), 'placeholder' => 'categoria']) }}
            {!! $errors->first('amenities_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        {{--<div class="form-group col-sm-6 mb-4">

            {{ Form::label('icon','Icono',['class'=>'mb-1'])  }}
            {{ Form::select('icon',[

            'fa-solid fa-shield' => '&#xf2b9; Garita (seguridad)' ,
            'fa-solid fa-person-swimming' => '&#xf5c4; Piscina',
            'fa-solid fa-person-walking' => '&#xf554; Movilidad Reducida',
            'fa-solid fa-water' => '&#xf773; Agua',
            'fa-solid fa-droplet-slash' => '&#xf5c7; Cloacas',
            'fa-solid fa-bolt' => '&#xf0e7; Electricidad',
            'fa-solid fa-fire-flame-simple' => '&#xf46a; Red de gas',
            'fa-solid fa-fire-flame-simple' => '&#xf46a; Nicho de gas',
            'fa-solid fa-paintbrush' => '&#xf1fc; Galeria',
            'fa-solid fa-tv' => '&#xf26c; Tv por cable',
            'fa-solid fa-wifi' => '&#xf1eb; Wifi',
            'fa-solid fa-tv' => '&#xf26c; Tv',
            'fa-solid fa-car-tunnel' => '&#xe4de; Estacionamiento Techado',
            'fa-solid fa-music' => '&#xf001; Musica',
            'fa-solid fa-shirt' => '&#xf553; Ropa de cama',
            'fa-solid fa-rug' => '&#xe569; Frazadas y covertores',
            'fa-solid fa-warehouse' => '&#xf494; Balcon',
            'fa-solid fa-arrow-up-from-water-pump' => '&#xe4b6; Patio',
            'fa-solid fa-utensils' => '&#xf2e7; Comedor',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-square-parking' => '&#xf540; Garaje',
            'fa-solid fa-person-breastfeeding' => '&#xe53a;Gingnacio',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',
            'fa-solid fa-dog' => '&#xf6d3; Mascotas',

         ],null, ['class' => 'form-control fa' . ($errors->has('icono') ? ' is-invalid' : ''), 'placeholder' => 'icono']) }}
            {!! $errors->first('icono', '<div class="invalid-feedback">:message</div>') !!}
        </div>--}}

        <div class="form-group col-12 col-sm-6 mb-4">
            {{ Form::label('$amenitiesCheck->icon','Cuarto icono sección',['class'=>'mb-1']) }}
            {{ Form::text('icon', $amenitiesCheck->icon, ['class' => 'form-control' . ($errors->has('$amenitiesCheck->icon') ? ' is-invalid' : ''), 'placeholder' => 'Marketing Free']) }}
            {!! $errors->first('$amenitiesCheck->icon', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <p>Para seleccionar tus iconos entrar en esta dirección y copia la sección class <a href="https://icons.getbootstrap.com" target="_blank">Iconos Bootstrap</a></p>




    </div>
    <div class="">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>