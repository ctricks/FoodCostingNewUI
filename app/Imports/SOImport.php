<?php

namespace App\Imports;

use App\Models\SOUploadModel;
use Maatwebsite\Excel\Concerns\ToModel;

class SOImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SOUploadModel([
           'BRANCHID' => $row[0],
           'ITEMCODE' => $row[1], 
           'QTY' => $row[2],
        ]);
    }
}
