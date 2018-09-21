



<table class='table'>
    <thead>
        <tr>
            <th class=''>ID</th>
            <th class=''>Categoria</th>
            <th class=''>Nombre</th>
            <th class=''>Marca</th>
            <th class='text-center'>Cantidad</th>
            <th class='text-center'>Peso</th>
            <th class='text-center'>Precio</th>
        </tr>
    </thead>
    {{ $j = 1 }}
    @foreach( $respuesta as $respuestas)
    <tbody>
        <th>
            <td class='' id='idP".$j."'>{{ $respuestas->id }}</td>
            <td class='' onclick='enter5()' id='categoria'>{{ $respuestas->categoria }}</td>
            <td class='' onclick='enter5()' id='nombre".$j."'>{{ $respuestas->nombre }}</td>
            <td class='' onclick='enter5()' id='marca".$j."'>{{ $respuestas->marca }}</td>
        </th>
    </tbody>
       {{ $j = 1 + 1 }}
    @endforeach
</table>