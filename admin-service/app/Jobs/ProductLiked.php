<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductLiked implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $data){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        /** @var Product $product */
        $product = Product::find($this->data['product_id']);
        $product->likes++;
        $product->save();
    }
}
