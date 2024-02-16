<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory,SoftDeletes;

    public function author()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function viewers()
    {
        return $this->hasMany(ContentView::class, 'content_id');
    }
}
