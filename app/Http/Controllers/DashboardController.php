<?php

namespace App\Http\Controllers;

use App\Models\Cocktail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // Hacemos una petición a la API pública de TheCocktailDB
        $response = Http::get('https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail');

        // Verificamos que la respuesta sea exitosa
        if ($response->successful()) {
            $cocktails = $response->json()['drinks'];
        } else {
            $cocktails = [];
        }

        return view('dashboard', compact('cocktails'));
    }
    // 2. Guardar cóctel en la base de datos
    public function store(Request $request)
    {
        // Validamos que ya no esté guardado por nombre
        $exists = Cocktail::where('name', $request->name)->first();
        if ($exists) {
            return redirect()->back()->with('success', 'Este cóctel ya está guardado ✅');
        }

        $cocktail = new Cocktail();
        $cocktail->name = $request->name;
        $cocktail->category = $request->category;
        $cocktail->alcoholic = $request->alcoholic;
        $cocktail->thumb = $request->thumb;
        $cocktail->save();

        return redirect()->back()->with('success', 'Cóctel guardado exitosamente 🎉');
    }

    // 3. Listar cócteles guardados
    public function list()
    {
        $cocktails = Cocktail::all();
        return view('cocktails.list', compact('cocktails'));
    }

    // 4. Mostrar formulario de edición
    public function edit(Cocktail $cocktail)
    {
        return view('cocktails.edit', compact('cocktail'));
    }

    // 5. Actualizar cóctel
    public function update(Request $request, Cocktail $cocktail)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'alcoholic' => 'nullable|string|max:255',
            'thumb' => 'nullable|url',
        ]);

        $cocktail->update([
            'name' => $request->name,
            'category' => $request->category,
            'alcoholic' => $request->alcoholic,
            'thumb' => $request->thumb,
        ]);

        return redirect()->route('cocktails.list')->with('success', 'Cóctel actualizado correctamente ✏️');
    }

    // 6. Eliminar cóctel
    public function destroy(Cocktail $cocktail)
    {
        $cocktail->delete();
        return redirect()->route('cocktails.list')->with('success', 'Cóctel eliminado exitosamente ❌');
    }
}
