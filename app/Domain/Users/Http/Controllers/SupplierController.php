<?php

namespace App\Domain\Users\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Users\Entities\User;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\Http\Controllers\Controller;
use App\Domain\Users\Http\Resources\UserResource;
use App\Domain\Users\Repositories\UserRepository;
use App\Domain\Users\Http\Resources\UserCollection;
use App\Domain\Users\Entities\Supplier;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $suppliers = Supplier::all();
        return $this->respondWithCustomData($suppliers);
    }
}