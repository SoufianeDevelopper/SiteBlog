<?php
namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Uuids, SoftDeletes;
    //
    protected $table = 'posts';

    protected $fillable = [
        'Title','user_id', 'Slug', 'Body','image', 'published', 'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
