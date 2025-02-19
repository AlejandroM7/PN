<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Auth\AuthRequest;
use App\Http\Resources\Api\User\UserResource;

class AuthController extends Controller
{
    public function store(AuthRequest $request): JsonResponse
    {
        try {
        
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                $token = $user->createToken('token-name')->plainTextToken;

                return response()->json(['message' => 'Token generado exitosamente.', 'token' => $token], 200);
            } else {
                return response()->json(['error' => 'Credenciales incorrectas. Verifica tu correo y contraseña.'], 401);
            }
        } catch (\Throwable $exception) {

            return response()->json(['error' => 'Ocurrió un error: ' . $exception->getMessage()], 500);
        }
    }

    public function token(Request $request): UserResource
    {
        $user = $request->user();

        return new UserResource($user);
    }

    public function destroy(Request $request): void
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->put('status', 'Logout successful.');

        //return redirect('/login-admin');
    }
}
