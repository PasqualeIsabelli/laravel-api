<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactProjectRequest;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(ContactProjectRequest $request) {
        $data = $request->validated();

        $contact = new Contact();

        $contact->fill($data);

        $contact->save();

        return response()->json([
            'message' => "Grazie {$data['name']} per il suo messaggio. Le risponderò il prima possibile."
        ], 210);
    }
}
