<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Client;
use App\Models\Price;
use App\Models\Testimonial;
use Carbon\Carbon;
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
        $user = Auth::user();
        $barbers = Barber::all();

        return view('panel.barbers', [
            'user' => $user,
            'barbers' => $barbers
        ]);
    }

    public function prices(): View
    {
        $user = Auth::user();
        $prices = Price::all();

        return view('panel.prices', [
            'user' => $user,
            'prices' => $prices
        ]);
    }

    public function testimonials(): View
    {
        $user = Auth::user();
        $testimonials = Testimonial::all();

        return view('panel.testimonials', [
            'user' => $user,
            'testimonials' => $testimonials
        ]);
    }

    public function clients(): View
    {
        $user = Auth::user();
        $clients = Client::whereDate('booking_date', Carbon::today())->orderBy('booking_time', 'asc')->get();

        return view('panel.clients', [
            'user' => $user,
            'clients' => $clients
        ]);
    }
}
