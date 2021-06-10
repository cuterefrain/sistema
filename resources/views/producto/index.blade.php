<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INDICE DEL PRODUCTO</title>
</head>
<body>
    <h1>LISTA DE PRODUCTOS</h1>
    <table class="table table-light" border="1">
        <thead class="thead-light">
            <th>ID</th>
            <th>MOMBRE</th>
            <th>PRECIO</th>
            <th>CANTIDAD</th>
            <th>FOTO</th>  
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombreP}}</td>
                <td>{{$producto->precioP}}</td>
                <td>{{$producto->cantidadP}}</td>
                <td>
                    <img src="{{asset('storage'.'/'.$producto->fotoP)}}" alt="" width="100px" height="100px">
                </td>
                <td>
                    <a href="{{route("producto.edit",$producto->id)}}" method="POST">
                        EDITAR
                    </a>
                    <form action="{{route("producto.destroy",$producto->id)}}" method='POST'>
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('¿ELIMINAR?')" value="ELIMINAR">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>