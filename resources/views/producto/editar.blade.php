<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDITAR PRODUCTO</title>
</head>
<body>
    <h1>EDITAR PRODUCTO</h1>
    <form action="{{route("producto.update",$producto->id)}}" method="POST" enctype="multipart/form-data" >
        @csrf
        {{method_field('PATCH')}}
        @include('producto.formulario')
    </form>
</body>
</html>