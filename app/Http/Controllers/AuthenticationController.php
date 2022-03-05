<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $rePassword = $request->repassword;
        if($password == $rePassword){
            $user = new User();
            $user->username = $username;
            $user->password = bcrypt($password);
            try {
                $user->save();
                return $this->successResult('Register successfully');
            }catch (\Exception $exception){
                return $this->failResult($exception->getMessage());
            }
        }else{
            return $this->failResult('Password not equal re-password');
        }
    }

    /**
     * Get a JWT via given credentials.
     */
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = User::query()->where('username', '=', $credentials['username'])->first();
        if ($user)
        {
            if (!Hash::check($credentials['password'], $user->password)) {
                return $this->failResult('Login fail');
            }else{
                $token = JWTAuth::fromUser($user);
                return $this->respondWithToken($token);
            }
        }else{
            return $this->failResult('Login fail');
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
