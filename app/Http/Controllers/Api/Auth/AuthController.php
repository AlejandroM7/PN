<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\AuthRequest;
use App\Http\Resources\Api\User\UserResource;

class AuthController extends Controller
{
    public function store(AuthRequest $request)
    {
        try {
            // Intenta autenticar al usuario
            if (Auth::attempt($request->only('email', 'password'))) {
                // Si la autenticación es exitosa, genera el token
                $user = Auth::user();
                $token = $user->createToken('token-name')->plainTextToken;

                return response()->json(['message' => 'Successfully generated token.', 'token' => $token], 200);
            } else {
                return response()->json(['error' => 'Unauthenticated user'], 401);
            }
        } catch (\Throwable $exception) {
            // Captura cualquier excepción y devuelve un error genérico
            return response()->json(['error' => 'Something went wrong: ' . $exception->getMessage()], 500);
        }
    }

    public function token(Request $request)
    {
        $user = $request->user();

        return new UserResource($user);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->put('status', 'Logout successful.');

        //return redirect('/login-admin');
    }
}
