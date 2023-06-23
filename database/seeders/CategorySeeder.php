<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'FrontEnd',
            'BackEnd',
            'FullStack',
            'Design'
        ];

        foreach( $categories as $elem ){

            $new_cat = new Category();

            $new_cat->name = $elem;

            $new_cat->slug = Str::slug($new_cat->name);

            $new_cat->save();
        }

    }
}
