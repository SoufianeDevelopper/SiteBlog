<?php

namespace App;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    use Uuids;
    //
    protected $table = 'categorys';

    protected $fillable = [
        'name'
    ];

    public function post(){
        return $this->hasMany(Post::class);
    }
}
