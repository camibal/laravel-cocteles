<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cóctel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h1 class="mb-4">Editar Cóctel</h1>

<form method="POST" action="{{ route('cocktails.update', $cocktail->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="name" value="{{ $cocktail->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Categoría</label>
        <input type="text" name="category" value="{{ $cocktail->category }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tipo</label>
        <input type="text" name="alcoholic" value="{{ $cocktail->alcoholic }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

</body>
</html>
