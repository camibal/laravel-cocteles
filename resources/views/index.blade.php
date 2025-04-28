<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cócteles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container mt-5">

<h1 class="mb-4">Cócteles Disponibles</h1>

<div class="row">
    @foreach($cocktails as $cocktail)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ $cocktail['strDrinkThumb'] }}" class="card-img-top" alt="{{ $cocktail['strDrink'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                    <p class="card-text">Categoría: {{ $cocktail['strCategory'] ?? 'No disponible' }}</p>
                    <p class="card-text">Alcoholico: {{ $cocktail['strAlcoholic'] ?? 'No disponible' }}</p>
                    <form method="POST" action="{{ route('cocktails.save') }}" class="save-cocktail">
                        @csrf
                        <input type="hidden" name="api_id" value="{{ $cocktail['idDrink'] }}">
                        <input type="hidden" name="name" value="{{ $cocktail['strDrink'] }}">
                        <input type="hidden" name="category" value="{{ $cocktail['strCategory'] }}">
                        <input type="hidden" name="alcoholic" value="{{ $cocktail['strAlcoholic'] }}">
                        <input type="hidden" name="thumbnail" value="{{ $cocktail['strDrinkThumb'] }}">
                        <button type="submit" class="btn btn-primary mt-2 w-100">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
$(document).ready(function(){
    $('.save-cocktail').submit(function(){
        alert('Cóctel guardado!');
    });
});
</script>

</body>
</html>
