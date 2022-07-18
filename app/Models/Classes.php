<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';
    protected $primaryKey = 'cid';
    protected $keyType = 'string';
    protected $fillable = [
        "name",
        "room",
        "created_at",
        "updated_at"
    ];

    public function students(){
        return $this->hasMany(Student::class,"cid","cid");
    }
}
