<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Services\userService;


class UsersController extends Controller
{

    protected $repository;
    protected $service;

    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }


    public function index()
    {
        $users = $this->repository->all();
        return view('user.index', ['users' => $users]);
    }


    public function store(UserCreateRequest $request)
    {

        $request = $this->service->store($request->all());
        $users = $request['success'] ? $request['data'] : null;


        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);
        return view('user.index', [
            'users' => $users,
        ]);
    }


    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
    }


    public function edit($id)
    {
        $user = $this->repository->find($id);
        return view('user.edit', [
            'user' => $user,
        ]);
    }


    public function update(Request $request, $id)
    {
        $request = $this->service->update($request->all(),$id);
        $users = $request['success'] ? $request['data'] : null;


        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);
        return view('user.index', [
            'users' => $users,
        ]);

    }



    public function destroy($id)
    {

        $request = $this->service->delete($id);

        session()->flash('success', [
            'success' => $request['success'],
            'message' => $request['message']
        ]);
        return redirect()->back()->with('message', 'Usuario deleted.');
    }
}
