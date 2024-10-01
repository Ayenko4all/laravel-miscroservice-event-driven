<?php

namespace App\Http\Controllers;

use App\Jobs\ProductLiked;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Product::all(), Response::HTTP_OK);
    }

    public function like($id, Request $request): JsonResponse
    {
        $response = Http::get('http://host.docker.internal:8000/api/user');
        Log::info($response->json());
        $user = $response->json();

        try {
            $productUser = ProductUser::create([
                'user_id' => $user['id'],
                'product_id' => $id
            ]);

            ProductLiked::dispatch($productUser->toArray())->onQueue('admin_queue');

            return response()->json(['message' => 'success'], Response::HTTP_OK);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'You already liked this product!'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
