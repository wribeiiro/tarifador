<?php

namespace App\Http\Controllers;

use App\Repositories\AuthRepository;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @var AuthRepository
     */
    private $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function auth(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|exists:users',
            'password' => 'required|string'
        ]);

        try {
            $this->repository->authenticate(
                $request->input('email', FILTER_SANITIZE_EMAIL),
                $request->input('password', FILTER_SANITIZE_STRING)
            );

            session()->put('sessionUser', [
                'id'         => rand(0, 9999),
                'email'      => $request->input('email'),
                'username'   => explode('@', $request->input('email'))[0],
                'isLoggedIn' => true
            ]);

            return response()->json([]);
        } catch(\Exception $exception) {
            return response()->json(['Deu ruim'], 401);
        }
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|string|confirmed'
        ]);

        $result = $this->repository->createUser($request->all());
        return response()->json($result, 201);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function viewRegister() {
        return view('auth.register');
    }

    public function viewLogin() {
        return view('auth.login');
    }
}
