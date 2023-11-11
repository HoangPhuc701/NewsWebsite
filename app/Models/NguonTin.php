<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguonTin extends Model
{
    use HasFactory;
    protected $primaryKey = 'MaNguon';
    public $table = 'NguonTin';
    public $inscrementing = true;
    public $timestamps = false;
}
