<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated(); 
    
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    
        return response()->json(['message' => 'L\'utilisateur a été bien crée !'], 201);
    }
    
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated(); 
    
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Connexion non établie. Vérifier votre email pour la connexion.'],
            ]);
        }
    
        $user = User::where('email', $credentials['email'])->first();
        $token = $user->createToken('api-token')->plainTextToken;
    
        return response()->json([
            'token' => $token,
            'user'=> $user
        ]);
        } catch (\Throwable $th) {
           echo $th;
        }
    }

}
