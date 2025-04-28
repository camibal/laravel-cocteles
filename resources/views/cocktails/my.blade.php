<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Cócteles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h1 class="mb-4">Cócteles Guardados</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cocktails as $cocktail)
            <tr>
                <td>{{ $cocktail->name }}</td>
                <td>{{ $cocktail->category }}</td>
                <td>{{ $cocktail->alcoholic }}</td>
                <td>
                    <a href="{{ route('cocktails.edit', $cocktail->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form method="POST" action="{{ route('cocktails.destroy', $cocktail->id) }}" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
