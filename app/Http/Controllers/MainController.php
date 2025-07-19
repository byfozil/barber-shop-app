<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use App\Models\Client;
use App\Models\Price;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(): View
    {
        $barbers = Barber::all();
        $testimonials = Testimonial::all();
        $prices = Price::all();

        return view('index', [
            'barbers' => $barbers,
            'testimonials' => $testimonials,
            'prices' => $prices
        ]);
    }

    public function book(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'barber' => 'required|exists:barbers,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required'
        ]);

        $existing = Client::where('booking_date', $validated['date'])
            ->where('barber_id', $validated['barber'])
            ->where('booking_time', $validated['time'])
            ->exists();

        if ($existing) {
            return back()->withErrors(['time' => 'This time slot is already booked. Please choose another time slot.']);
        }

        Client::create([
            'name' => $validated['name'],
            'phone_number' => $validated['phone_number'],
            'barber_id' => $validated['barber'],
            'booking_date' => $validated['date'],
            'booking_time' => $validated['time'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Booking successful!');
    }

    public function getAvailableTimes(Request $request)
    {
        $date = $request->input('date');
        $barberId = $request->input('barber_id');

        $allTimes = [
            '09:00',
            '10:00',
            '11:00',
            '12:00',
            '13:00',
            '14:00',
            '15:00',
            '16:00',
            '17:00',
            '18:00',
            '19:00',
            '20:00',
            '21:00'
        ];

        $bookedTimes = Client::where('booking_date', $date)->where('barber_id', $barberId)
            ->pluck('booking_time')
            ->map(function ($time) {
                return Carbon::createFromFormat('H:i:s', $time)->format('H:i');
            })
            ->toArray();

        $availableTimes = array_values(array_diff($allTimes, $bookedTimes));

        return response()->json($availableTimes);
    }
}
