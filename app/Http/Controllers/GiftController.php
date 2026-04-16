<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\GiftCreated;

class GiftController extends Controller
{
    public function index()
    {
        $gifts = Gift::all();

        return view('welcome', compact('gifts'));
    }

    public function create()
    {
        return view('gifts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'url' => ['nullable', 'url:http,https'],
            'details' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'decimal:0,2'],
        ]);

        $gift = Gift::create($validated);

        Mail::to('mailgun@example.com')->send(
            new GiftCreated($gift->name, $gift->price)
        );

        return redirect()->route('home');
    }

    public function show(Gift $gift)
    {
        return view('gifts.show', compact('gift'));
    }

    public function edit(Gift $gift)
    {
        return view('gifts.edit', compact('gift'));
    }

    public function update(Request $request, Gift $gift)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:50'],
            'url' => ['nullable', 'url:http,https'],
            'details' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'decimal:0,2'],
        ]);

        $gift->update($validated);

        return redirect()->route('home');
    }

    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect()->route('home');
    }
}