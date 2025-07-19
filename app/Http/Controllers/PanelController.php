<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Client;
use App\Models\Price;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PanelController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function login_post(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('barbers');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }

    public function panel(): RedirectResponse
    {
        return redirect()->route('barbers');
    }

    public function barbers(): View
    {
        $barbers = Barber::all();

        return view('panel.barbers', [
            'barbers' => $barbers
        ]);
    }

    public function prices(): View
    {
        $prices = Price::all();

        return view('panel.prices', [
            'prices' => $prices
        ]);
    }

    public function testimonials(): View
    {
        $testimonials = Testimonial::all();

        return view('panel.testimonials', [
            'testimonials' => $testimonials
        ]);
    }

    public function clients(): View
    {
        $clients = Client::all();

        return view('panel.clients', [
            'clients' => $clients
        ]);
    }
}
