<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $user = User::inRandomOrder()->first();

        return response()->json(data: ['id' => $user->id], status: Response::HTTP_OK);
    }
}
