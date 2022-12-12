<?php

namespace App\Http\Controllers\API;

use App\Helper\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\LogoutResource;
use App\Http\Resources\API\Auth\LoginResources;
use App\Http\Resources\API\Auth\LogoutResources;
use App\Interfaces\IUserServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Passport\TokenRepository;

class AuthController extends Controller
{
    public $services;
    public function __construct(IUserServices $services)
    {
        $this->services = $services;
    }
    public function login(LoginRequest $request)
    {
        try {
            if($auth = $this->services->login($request)){
                return response()->json(new LoginResources($auth));
            }
            return ResponseHelpers::errorResponse(400,"User Not Authenticated, Email / Password Wrong");
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return ResponseHelpers::errorResponse(400,"Authentication Error, Call Admin");

        }
    }

    public function Logout(Request $request)
    {
        try {
            if($this->services->Logout($request)){
                return ResponseHelpers::successResponse(200,"User Has Logged Out");
            }
                return ResponseHelpers::errorResponse(400,'Authentication error, Call Admin');
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                return ResponseHelpers::errorResponse(400,'Authentication error, Call Admin');
        }
    }
}
