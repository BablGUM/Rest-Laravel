<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUser;
use App\Http\Requests\UserLogin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(AddUser $request)
    {
        $user = User::create($request->all());
        return response()->json([
            'user_id' => $user->id
        ])->setStatusCode('201', 'Created');
    }

    public function index()
    {
        //все поля return User::with('lists')->get();
        //конкеретные поля return User::with('tasks:id,user_id,name')->get();
        return User::all();
//        User::with('lists')->get()->map(function ($item) {
//            dd($item);
//        });
    }

    public function show(User $user)
    {
        return $user;
    }

    public function login(UserLogin $request)
    {
        if ($user = User::where(['login' => $request->login])->first() and ($request->password == $user->password)) {
            $token = $user->generateToken();
            return response()->json([
                'api_token' => $token,
            ])->setStatusCode('200', 'OK');
        }
        return response()->json([
            'message' => 'Такого пользователя не существует'
        ])->setStatusCode('404', 'Not Found');
    }

    public function logout()
    {
        $user = User::where(['id' => Auth::user()->id])->first();
        $user->api_token = null;
        $user->save();
        return response()->setStatusCode('200', 'OK');
    }

}
