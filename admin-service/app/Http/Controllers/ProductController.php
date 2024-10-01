<?php

namespace App\Http\Controllers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Product::all(), Response::HTTP_OK);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json($product, Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        /** @var Product $product */
        $product = Product::create($request->all());

        ProductCreated::dispatch($product->toArray())
            ->onQueue("main_queue");

        return response()->json($product, Response::HTTP_CREATED);
    }

    public function update(Request $request, Product $product): JsonResponse
    {
        $product->update($request->all());

        ProductUpdated::dispatch($product->refresh()->toArray())
            ->onQueue("main_queue");

        return response()->json($product, Response::HTTP_OK);
    }

    public function destroy(int $productId): JsonResponse
    {
        Product::destroy($productId);

        ProductDeleted::dispatch($productId)->onQueue("main_queue");

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
