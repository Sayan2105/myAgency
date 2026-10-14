<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        // Honeypot: real people never fill the hidden "website" field, bots do.
        if (filled($request->input('website'))) {
            return response()->json(['ok' => true], 201);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'contact' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        ContactMessage::create($data + ['source' => 'website']);

        return response()->json(['ok' => true], 201);
    }
}
