<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface IUserServices
{
    public function Login(Request $request);
    public function Logout(Request $request);
    public function UserDetail($request);
}
