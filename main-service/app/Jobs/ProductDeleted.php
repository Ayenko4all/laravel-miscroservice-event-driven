<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;

class ProductDeleted implements ShouldQueue
{
    use Dispatchable ,Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public int $productId){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Product::destroy($this->productId);
    }
}
