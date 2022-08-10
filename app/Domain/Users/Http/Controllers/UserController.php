<?php

namespace App\Domain\Users\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Users\Entities\User;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Http\Controllers\Controller;
use App\Domain\Users\Http\Resources\UserResource;
use App\Domain\Users\Repositories\UserRepository;
use App\Domain\Users\Http\Resources\UserCollection;

class UserController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
        $this->resourceItem = UserResource::class;
        $this->resourceCollection = UserCollection::class;
       // $this->authorizeResource(User::class);
    }

    public function store(Request $request)
    {
        $data = [
            'name' => 'kqd+1',
            'email' => 'quockidang+1@gmail.com',
            'password' => Hash::make('password')
        ];
        $user = $this->userRepository->store($data);
        return $this->respondWithItem($user);
    }

    public function show(User $user)
    {
        return $this->respondWithItem($user);
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->findByFilters();
        return $this->respondWithCollection($users);
    }

    public function delete (User $user)
    {
        $user->delete();

        return $this->respondWithNoContent();
    }
}