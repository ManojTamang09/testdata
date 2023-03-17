<?php

namespace App\Imports;

use App\Models\Upload;
use App\User;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithBatchInserts, WithChunkReading ,WithHeadingRow
{
    use RemembersRowNumber;

    public function model(array $row)

    {


        // $currentRowNumber = $this->getRowNumber();

        return new Upload([
            'title'=>$row['title'],
            'firstname'=>$row['firstname'],
            'lastname'=>$row['lastname'],
            'lastname'=>$row['lastname'],
            'gender'=>$row['gender'],
            'specialty'=>$row['specialty'],
            'practice'=>$row['practice'],
            'phone'=>$row['phone'],
            'fax'=>$row['fax'],
            'email'=>$row['email'],
            'address'=>$row['address'],
            'city'=>$row['city'],
            'county'=>$row['county'],
            'state'=>$row['state'],
            'zip'=>$row['zip'],
            'latitude'=>$row['latitude'],
            'longitude'=>$row['longitude'],
            'siccode'=>$row['siccode'],
            'website'=>$row['website'],
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
