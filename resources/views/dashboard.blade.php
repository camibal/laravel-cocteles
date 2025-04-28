<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="row" id="cocktails-list">
        @foreach($cocktails as $cocktail)
            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $cocktail['strDrinkThumb'] }}" class="card-img-top" alt="Imagen de {{ $cocktail['strDrink'] }}" style="object-fit: cover; height: 250px;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $cocktail['strDrink'] }}</h5>
                        <p class="card-text">
                            <strong>Categoría:</strong> {{ $cocktail['strCategory'] ?? 'N/A' }}<br>
                            <strong>Alcohol:</strong> {{ $cocktail['strAlcoholic'] ?? 'N/A' }}
                        </p>
                        <form method="POST" action="{{ route('cocktails.store') }}" class="mt-auto">
                            @csrf
                            <input type="hidden" name="name" value="{{ $cocktail['strDrink'] }}">
                            <input type="hidden" name="category" value="{{ $cocktail['strCategory'] ?? '' }}">
                            <input type="hidden" name="alcoholic" value="{{ $cocktail['strAlcoholic'] ?? '' }}">
                            <input type="hidden" name="thumb" value="{{ $cocktail['strDrinkThumb'] }}">
                            <button type="submit" class="btn btn-primary w-100">
                                Guardar en base de datos
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
        </div>
        
    </div>
</x-app-layout>
