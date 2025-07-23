<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BarberController extends Controller
{
    public function barber_add(): View
    {
        $user = Auth::user();

        return view('barber.add', [
            'user' => $user
        ]);
    }

    public function barber_add_post(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3'
        ]);

        Barber::create([
            'name' => $request->name,
        ]);

        return redirect()->route('barbers');
    }

    public function barber_edit(int $id)
    {
        $user = Auth::user();
        $barber = Barber::where('id', $id)->first();

        if ($barber) {
            return view('barber.edit', [
                'user' => $user,
                'barber' => $barber
            ]);
        } else {
            return redirect()->route('barbers');
        }
    }

    public function barber_edit_put(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:barbers,id',
            'name' => 'required|string|max:255|min:3'
        ]);

        Barber::where('id', $request->id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('barbers');
    }

    public function barber_delete(int $id)
    {
        $user = Auth::user();
        $barber = Barber::where('id', $id)->first();

        if ($barber) {
            return view('barber.delete', [
                'user' => $user,
                'barber' => $barber
            ]);
        } else {
            return redirect()->route('barbers');
        }
    }

    public function barber_delete_delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:barbers,id',
        ]);

        Barber::destroy($request->id);

        return redirect()->route('barbers');
    }
}
