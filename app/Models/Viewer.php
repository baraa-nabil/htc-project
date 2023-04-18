<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Viewer extends Model
{
    use HasFactory, HasRoles;
    public function user()
    {
        return $this->morphOne(User::class, 'actor', 'actor_type', 'actor_id', 'id');
    }
    // get_Attribute
    public function getFullNameAttribute() // full_name
    {
        return $this->user->firstname . " " . $this->user->lastname;
    }

    public function getImagesAttribute() //images
    {
        return $this->user->image;
    }
}