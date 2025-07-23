<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function client_status(int $id)
    {
        $user = Auth::user();
        $client = Client::where('id', $id)->first();

        if ($client) {
            return view('client.status', [
                'user' => $user,
                'client' => $client
            ]);
        } else {
            return redirect()->route('clients');
        }
    }

    public function client_status_put(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:prices,id',
            'status' => 'required|string',
        ]);

        Client::where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return redirect()->route('clients');
    }
}
