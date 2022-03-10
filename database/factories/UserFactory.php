<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'no_ktp' => $this->faker->name(),
            'name' => $this->faker->name(),
            'tempat_lahir' => $this->faker->name(),
            'tgl_lahir' => $this->faker->date(),
            'alamat_rumah' => $this->faker->name(),
            'province_id' => $this->faker->name(),
            'regency_id' => $this->faker->name(),
            'district_id' => $this->faker->name(),
            'village_id' => $this->faker->name(),
            'no_telpon' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
