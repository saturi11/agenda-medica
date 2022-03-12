<?php

namespace App\Http\Controllers;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;


use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
    public function index()
    {
        return view('user.dashboard');
    }



    public function auth(Request $request)
    {
        $data=[
            'email'  =>$request ->get('username'),
            'password' =>$request ->get('password'),
        ];
        try{
            \Auth::attempt($data ,false);
            return redirect()->route('user.index');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }



    }

}
