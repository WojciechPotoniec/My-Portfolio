<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title','image', 'content', 'slug', 'type_id'];

    public static function generateSlug($title){
        $slug = Str::slug($title, '-');
        $count = 1;
        while(Project::where('slug', $slug)->first()){
            $slug = Str::slug($title . '-' . $count, '-');
            $count++;
        }
        return $slug;
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
