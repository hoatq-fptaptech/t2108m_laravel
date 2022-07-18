<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'sid';
    protected $keyType = 'string';
    protected $fillable = [
        'name',
        'birthday',
        'cid',
        'created_at',
        'updated_at'
    ];

    public function classes(){
        // return 1 object Classes
        //return Classes::where("cid",$this->cid)->first();
        return $this->belongsTo(Classes::class,"cid","cid");
    }
}
