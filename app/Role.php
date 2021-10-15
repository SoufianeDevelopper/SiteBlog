<?php

namespace App;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    use Uuids;
    //
    protected $table = 'roles';

    protected $fillable = [
        'role'
    ];



    public function user(){
        return $this->hasMany(User::class);
    }
}
