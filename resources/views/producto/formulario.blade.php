
<label for="nombreP">NOMBRE PRODUCTO</label>
<input type="text" name="nombreP" id="nombreP" value="{{isset($producto->nombreP)?$producto->nombreP:' '}}">
<br>

<label for="precioP">PRECIO</label>
<input type="text" name="precioP" id="precioP" value="{{isset($producto->precioP)?$producto->precioP:' '}}">
<br>

<label for="cantidadP">CANTIDAD</label>
<input type="text" name="cantidadP" id="cantidadP" value="{{isset($producto->cantidadP)?$producto->cantidadP:' '}}">
<br>

<label for="fotoP">FOTO</label>

@if (isset($producto->fotoP))
    <img src="{{asset('storage'.'/'.$producto->fotoP)}}" alt="" width="100px" height="100px">    
@endif

<input type="file" name="fotoP" id="fotoP">

<br>
<input type="submit" value="REGISTRAR">