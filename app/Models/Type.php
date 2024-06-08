<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Str;
use App\Models\Project;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    public static function generateSlug($name)
    {
        $slug = Str::slug($name, '-');

        return $slug;
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
