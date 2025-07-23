<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PriceController extends Controller
{
    public function price_add(): View
    {
        $user = Auth::user();

        return view('price.add', [
            'user' => $user
        ]);
    }

    public function price_add_post(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'price' => 'required|numeric|max:100000|min:0'
        ]);

        Price::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('prices');
    }

    public function price_edit(int $id)
    {
        $user = Auth::user();
        $price = Price::where('id', $id)->first();

        if ($price) {
            return view('price.edit', [
                'user' => $user,
                'price' => $price
            ]);
        } else {
            return redirect()->route('prices');
        }
    }

    public function price_edit_put(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:prices,id',
            'name' => 'required|string|max:255|min:3',
            'price' => 'required|numeric|max:100000|min:0'
        ]);

        Price::where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return redirect()->route('prices');
    }

    public function price_delete(int $id)
    {
        $user = Auth::user();
        $price = Price::where('id', $id)->first();

        if ($price) {
            return view('price.delete', [
                'user' => $user,
                'price' => $price
            ]);
        } else {
            return redirect()->route('prices');
        }
    }

    public function price_delete_delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:prices,id',
        ]);

        Price::destroy($request->id);

        return redirect()->route('prices');
    }
}
