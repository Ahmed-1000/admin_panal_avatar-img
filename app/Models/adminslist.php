<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminslist extends Model
{
    use HasFactory;

    protected $fillable = [
      'name','pass','avatars'
    ];

    public function getavatarsattribute(){

        if($this->avatars){
            return storage::disk('avatars')->url($this->avatars);
        }

        return asset('profile.jpg');
    }
}
    

