<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\UserResource;
use App\Http\Requests\Api\Auth\RegisterRequest;

class RegisteredUserController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        return response()->json([
            'message' => 'Users registered correctly.',
            'user' => new UserResource($user)
        ], 200);
    }

}