<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
    ];


    public function details(){
        return $this->hasMany(HistoryDetail::class,"history_id","history_id");
    }
}
