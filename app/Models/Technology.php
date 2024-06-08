<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Support\Str;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    public static function generateSlug($name)
    {
        $slug = Str::slug($name, '-');
        $count = 1;
        while (Project::where('slug', $slug)->first()) {
            $slug = Str::slug($name . '-' . $count, '-');
            $count++;
        }
        return $slug;
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
