<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    public $table="settings";
    protected $fillable = ['id',
                            'Module',
                            'SettingName',
                            'Description',
                            'Value',
    ];
}
