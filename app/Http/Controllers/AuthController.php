<?php

namespace App\Http\Controllers;

use App\Enums\TokenAbility;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return response()->json([
            'message' => 'success'
        ]);
    }

    public function login(LoginRequest $request)
    {
        $request->validated();

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'invalid credentials!',
            ], 401);
        }

        $access_token = $user->createToken('access_token', [TokenAbility::ACCESS_API->value], Carbon::now()->addMinutes(config('sanctum.ac_expiration')))->plainTextToken;

        $refresh_token = $user->createToken('refresh_token', [TokenAbility::ISSUE_ACCESS_TOKEN->value], Carbon::now()->addMinutes(config('sanctum.rt_expiration')))->plainTextToken;

        $cookie = Cookie('refresh_token', $refresh_token, 10080, null, null, true, true);

        return response()->json([
            'access_token' => $access_token,
            'refresh_token' => $refresh_token,
            'user' => $user,
        ])->cookie($cookie);
    }

    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user(),
        ]);
    }

    public function refresh(Request $request)
    {
        $access_token = $request->user()->createToken('access_token', [TokenAbility::ACCESS_API->value], Carbon::now()->addMinutes(config('sanctum.ac_expiration')))->plainTextToken;

        $refresh_token = $request->user()->createToken('refresh_token', [TokenAbility::ISSUE_ACCESS_TOKEN->value], Carbon::now()->addMinutes(config('sanctum.rt_expiration')))->plainTextToken;

        $cookie = Cookie('refresh_token', $refresh_token, 10080, null, null, true, true);

        return response()->json([
            'access_token' => $access_token,
        ])->cookie($cookie);
    }
}
