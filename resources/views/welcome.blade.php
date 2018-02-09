@extends('layouts.principal')

@section('content')
    <div>
        <p>CREAR USUARIO</p>

    </div>
    <div>

        {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
        @include('usuario.forms.formulario')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}

        {!!Form::open(['route'=>'Usuario', 'method'=>'POST'])!!}
        <div class="form-group">
            {!!Form::label('nombre','Nombre:')!!}
            {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Usuario'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('email','Correo:')!!}
            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
        </div>
        <div class="form-group">
            {!!Form::label('password','Contraseña:')!!}
            {!!Form::password('password',['class'=>'form-control','placeholder'=>'Usuario'])!!}
        </div>
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}

    </div>
    <div>
        <table class="table">
            <thead>
            <th>Nombre</th>
            <th>Creado</th>
            <th>Actualizado</th>
            <th>editar</th>
            <th>estatus</th>
            </thead>
            @foreach($permisos as $permiso)
                <tbody>
                <td>{{$permiso->nombre}}</td>
                <td>{{$permiso->created_at}}</td>
                <td>{{$permiso->updated_at}}</td>
                @if(($permiso->estatus) == 1)
                    <th>activo</th>
                @else
                    <th>inactivo</th>
                @endif
                <th>{!!link_to_route('permiso.edit', $title = 'Editar', $parameters = $permiso, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                </tbody>
            @endforeach
        </table>
    </div>

@endsection