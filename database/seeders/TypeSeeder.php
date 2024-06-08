<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['FrontEnd','BackEnd'];
        foreach($types as $type){
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Type::generateSlug($newType->name);
            $newType->save();
        }
    }
}
