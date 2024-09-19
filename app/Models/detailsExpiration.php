<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailsExpiration extends Model
{
    use HasFactory;
    public $table="transactiondetails_expiry";
    protected $fillable = ['id',
                            'transactionId',
                            'ItemCode',
                            'REC_Qty',
                            'Expiration_date',
                            'Added_by',
                            'branch_id',
                            
];
}
