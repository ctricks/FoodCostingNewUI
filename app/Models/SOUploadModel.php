<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SOUploadModel extends Model
{
    use HasFactory;

    public $table="so_upload_table";

    protected $fillable = ['CATEGORY',  
                            'ITEMCODE',
                             'BRANCHID',
                             'QTY',
                             'PKEY',
                             'UploadedByID',
                             'EXCELFILENAME'
                            ];
}
