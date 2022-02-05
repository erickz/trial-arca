<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Config;

class CompanyFactory extends Factory
{
    /**
     * Get the states from the constants and pick according the given param
     * @return String
     */
    public function getStateByIndex($index)
    {
        return Config::get('constants.states')[$index];
    }    

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'telephone' => $this->faker->numerify('(##) #####-####'),
            'address' => $this->faker->address(),
            'zipcode' => $this->faker->numerify('########'),
            'city' => $this->faker->city(),
            //Pick a state from the constant
            'state' => $this->getStateByIndex(rand(0,26)),
            'description' => $this->faker->text(),
        ];
    }
}
