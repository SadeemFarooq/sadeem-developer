<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Make sure to import the DB facade

class ContactController extends Controller
{
    public function submitContact(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        
        // Insert the form data into the "contacts" table
        DB::table('contacts')->insert($validatedData);

        // Return a response indicating success
        return response()->json(['message' => 'Data submitted successfully.']);
    }
}
