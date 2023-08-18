<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:emails',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => $validator->errors()], 400);
            }

            $email = new Email();
            $email->email = $request->input('email');
            $email->save();

            return response()->json(['message' => 'Email stored successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
