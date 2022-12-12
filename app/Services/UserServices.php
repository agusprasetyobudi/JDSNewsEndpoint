<?php

namespace App\Services;

use App\Helper\ResponseHelpers;
use App\Interfaces\IUserServices;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticationUsers;

class UserServices implements IUserServices
{
    private $model;
    public function __construct(UserRepository $model)
    {
        $this->model = $model;
    }
    public function Login(Request $request)
    {
        if(Auth::attempt($request->all())){
            return Auth::user();
        }
        return false;
    }

    public function UserDetail($request)
    {
        if($model = $this->model->findUser($request->getContent()?$request->id:Auth::user()->id)){

        }

        return $model;
    }

    public function Logout(Request $request)
    {
        dd(Auth::user()->token()->revoke());
    }
}
