<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function testimonial_add(): View
    {
        $user = Auth::user();

        return view('testimonial.add', [
            'user' => $user
        ]);
    }

    public function testimonial_add_post(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'author' => 'required|string|max:255|min:3',
            'content' => 'required|string|max:50000|min:5'
        ]);

        Testimonial::create([
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect()->route('testimonials');
    }

    public function testimonial_edit(int $id)
    {
        $user = Auth::user();
        $testimonial = Testimonial::where('id', $id)->first();

        if ($testimonial) {
            return view('testimonial.edit', [
                'user' => $user,
                'testimonial' => $testimonial
            ]);
        } else {
            return redirect()->route('testimonials');
        }
    }

    public function testimonial_edit_put(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:testimonials,id',
            'author' => 'required|string|max:255|min:3',
            'content' => 'required|string|max:50000|min:5'
        ]);

        Testimonial::where('id', $request->id)->update([
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect()->route('testimonials');
    }

    public function testimonial_delete(int $id)
    {
        $user = Auth::user();
        $testimonial = Testimonial::where('id', $id)->first();

        if ($testimonial) {
            return view('testimonial.delete', [
                'user' => $user,
                'testimonial' => $testimonial
            ]);
        } else {
            return redirect()->route('testimonials');
        }
    }

    public function testimonial_delete_delete(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer|exists:testimonials,id',
        ]);

        Testimonial::destroy($request->id);

        return redirect()->route('testimonials');
    }
}
