<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{   
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Project::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->title,
            'subtitle'=>$this->faker->title,
            'description'=>$this->faker->text,
            'url'=>$this->faker->url,
            'img_url'=>$this->faker->url
        ];
    }
}
