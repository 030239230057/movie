<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model {
    protected $table = 'movie';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Global scope để luôn chỉ lấy phim có status = 1 theo yêu cầu 
    protected static function booted() {
        static::addGlobalScope('active', function ($builder) {
            $builder->where('status', 1);
        });
    }
}
?>