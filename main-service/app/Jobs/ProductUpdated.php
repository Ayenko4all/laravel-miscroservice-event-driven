<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;

class ProductUpdated implements ShouldQueue
{
    use Dispatchable ,Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $data){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Product::whereId($this->data['id'])->update([
            "title" => $this->data['title'],
            "image" => $this->data['image'],
        ]);
    }
}
