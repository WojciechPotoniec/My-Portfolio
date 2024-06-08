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
    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        $count = 1;
        while(Project::where('slug', $slug)->first()){
            $slug = Str::slug($title . '-' . $count, '-');
            $count++;
        }
        return $slug;
    }

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
