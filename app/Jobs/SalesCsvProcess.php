<?php

namespace App\Jobs;

use Throwable;
use App\Models\Sales;
use App\Models\Upload;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SalesCsvProcess implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $header)
    {
        $this->data   = $data;
        $this->header = $header;

        // dd($data);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hello= $this->data;
        // foreach ($this->data as $sale) {

            // dd($hello);
            // $saleData = array_combine($this->header, $sale);
            Upload::create($hello);
        // }
    }

    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}
