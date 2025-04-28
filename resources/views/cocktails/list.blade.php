<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <h1>Cócteles Guardados</h1>

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if($cocktails->count())
                <table class="table table-striped table-hover" id="cocktailTable">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cocktails as $cocktail)
                <tr>
                    <td>
                        <img src="{{ $cocktail['thumb'] }}" alt="{{ $cocktail->strDrink }}" width="80">
                    </td>
                    <td>{{ $cocktail->name }}</td>
                    <td>
                        <a href="{{ route('cocktails.edit', $cocktail->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('cocktails.destroy', $cocktail->id) }}" method="POST" style="display:inline-block;" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

                @else
                <div class="alert alert-info">
                    No hay cócteles guardados todavía.
                </div>
                @endif
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar DataTable
            $('#cocktailTable').DataTable();
        });
    </script>
</x-app-layout>