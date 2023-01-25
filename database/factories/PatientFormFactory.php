<?php

namespace Database\Factories;

use App\Models\PatientForm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientForm>
 */
class PatientFormFactory extends Factory
{
    protected $model = PatientForm::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['Male', 'Female']);
        $day = fake()->randomElement(['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
        $mainReason = fake()->randomElement([
            "Hypertension",
            "Diabetes",
            "Urinary Tract Infection",
            "Tubercolosis",
            "Headache",
            "Pneumonia",
            "Heart Disease",
            "Gastritis",
            "Ulcer", 
            "Colds / Flu",
            "Stomache Aches",
            "Cough",
            "Sore Throat",
            "Sore Throat",
            "Athritis",
            "Appendicitis", 
            "Asthma" ,
            "Cancer",
            "Bronchitis",
            "Chickenpox",
            "Constipation",
            "COVID",
            "Hepatitis",
            "Malaria",
            "Dengue",
            "Osteoporosis",
            "Sinusitis",
            "Stroke",
            "Tonsilitis",
        ]);

        $allergies = fake()->randomElement(['Nuts', 'Pollen', 'Seafoods', 'Egg', 'Dust', 'Weather']);
        $doctor = fake()->randomElement(['Doctor 1', 'Doctor 2', 'Doctor 3', 'Doctor 4', 'Doctor 5', 'Doctor 6', 'Doctor 7', 'Doctor 8', 'Doctor 9', 'Doctor 10']);


        return [
            'name' => fake()->name(),
            'age' => random_int(0,99),
            'gender' => $gender,
            'birthdate' => fake()->dateTimeBetween('1990-01-01', '2022-12-31')->format('d/m/Y'),
            'height' => random_int(0,999),
            'weight' => random_int(0,999),
            'address' => fake()->address(),
            'contact_number' => '09'. random_int(1000000,999999999),
            'email' => fake()->unique()->email,
            'doctor_consulting' => $doctor,
            'day' => $day,
            'available_from' => fake()->time(),
            'available_to' => fake()->time(),
            'heart_rate' => random_int(0,99),
            'blood_pressure' => random_int(0,99),
            'temperature' => random_int(36,60),
            'oxygen_saturation' => random_int(0,99),
            'other_reason_for_consultation' => $mainReason,
            'main_reason_for_consultation' => $mainReason,
            'allergies' => $allergies,
            'maintenance_medications' => 'Herbal',
            'current_medications' => 'Herbal, Alternative Medicines',
            'is_done_consulting' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
