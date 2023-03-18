<?php

namespace App\Jobs;

// use App\Models\Upload;
// use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Bus\Dispatchable;
// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Queue\SerializesModels;
// use Maatwebsite\Excel\Facades\Excel;


// class ProcessExcelJob implements ShouldQueue
// {
//     use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//     protected $path;

//     public function __construct($path)
//     {
//         $this->path = $path;
//     }

//     public function handle(array $row)
//     {

//         return new Upload([
//             'title'=>$row['title'],
//             'firstname'=>$row['firstname'],
//             'lastname'=>$row['lastname'],
//             'lastname'=>$row['lastname'],
//             'gender'=>$row['gender'],
//             'specialty'=>$row['specialty'],
//             'practice'=>$row['practice'],
//             'phone'=>$row['phone'],
//             'fax'=>$row['fax'],
//             'email'=>$row['email'],
//             'address'=>$row['address'],
//             'city'=>$row['city'],
//             'county'=>$row['county'],
//             'state'=>$row['state'],
//             'zip'=>$row['zip'],
//             'latitude'=>$row['latitude'],
//             'longitude'=>$row['longitude'],
//             'siccode'=>$row['siccode'],
//             'website'=>$row['website'],
//         ]);
// }
//             public function batchSize(): int
//             {
//                 return 1000;
//             }

//             public function chunkSize(): int
//             {
//                 return 1000;
//             }
// }

namespace App\Jobs;

use App\Models\Upload;
use Illuminate\Bus\Queueable;
use Illuminate\Http\UploadedFile;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ProcessExcelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;

        // dd($this->filePath);
    }

    public function handle()
    {
        dd("inside job");
        $chunkSize = 1000; // Set the chunk size to 1000 records per chunk

        // $collection = collect(IOFactory::load($this->filePath)->getActiveSheet()->toArray());

        // $chunks = $collection->chunk($chunkSize);

        $filePath = public_path($this->filePath);
        // dd($filePath);
        $collection = new Collection(IOFactory::load($filePath)->getActiveSheet()->toArray());
        $chunks = $collection->chunk($chunkSize);


        $chunks->each(function ($chunk) {
            DB::transaction(function () use ($chunk) {
                foreach ($chunk as $row) {
                    // Create a new model instance for each row and save it to the database
                    Upload::create([
                        'title' => $row[0],
                        'firstname' => $row[1],
                        'lastname' => $row[2],
                        'fullname' => $row[3],
                        'gender' => $row[4],
                        'specialty' => $row[5],
                        'practice' => $row[6],
                        'phone' => $row[7],
                        'fax' => $row[8],
                        'email' => $row[9],
                        'address' => $row[10],
                        'city' => $row[11],
                        'county' => $row[12],
                        'state' => $row[13],
                        'zip' => $row[14],
                        'latitude' => $row[15],
                        'longitude' => $row[16],
                        'siccode' => $row[17],
                        'website' => $row[18],
                    ]);
                }
            });
        });


// $collection = new Collection(IOFactory::load($filePath)->getActiveSheet()->toArray());

// // Skip the first row of the collection
// $data = $collection->skip(1);

// foreach ($data as $row) {
//     // Create a new Upload model instance
//     Upload::create([
//         'title' => $row[0],
//         'firstname' => $row[1],
//         'lastname' => $row[2],
//         'fullname' => $row[3],
//         'gender' => $row[4],
//         'specialty' => $row[5],
//         'practice' => $row[6],
//         'phone' => $row[7],
//         'fax' => $row[8],
//         'email' => $row[9],
//         'address' => $row[10],
//         'city' => $row[11],
//         'county' => $row[12],
//         'state' => $row[13],
//         'zip' => $row[14],
//         'latitude' => $row[15],
//         'longitude' => $row[16],
//         'siccode' => $row[17],
//         'website' => $row[18],
//     ]);
// }
    }
}
