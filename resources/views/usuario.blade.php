<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {!!Html::style('css/bootstrap.css')!!}
    </head>
    <body>
        <h1>Acceso:</h1>
        {!!Form::open(['route'=>'login', 'method'=>'POST'])!!}
            <div class="form-group">
                {!!Form::label('Nombre:')!!}
                {!!Form::text('name',null,['class'=> 'form-control', 'placeholder'=>'Inserte el nombre de usuario'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Contraseña:')!!}
                {!!Form::text('contraseña',null,['class'=>'form-control', 'placeholder'=> 'Inserte su contraseña'])!!}
            </div>
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </body>
</html>