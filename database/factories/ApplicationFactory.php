<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Career;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    // Define file paths relative to public/storage/uploads/
    $resumePath = 'uploads/resumes/' . $this->faker->word . '.pdf';
    $certificatePath = 'uploads/competence_certificates/' . $this->faker->word . '.pdf';
    $picturePath = 'uploads/self_pictures/' . $this->faker->word . '.jpg';
    $idCardPath = 'uploads/identity_cards/' . $this->faker->word . '.jpg';

    // Store fake content for PDFs
    Storage::disk('public')->put($resumePath, $this->faker->text(200));  // Fake PDF for resume
    Storage::disk('public')->put($certificatePath, $this->faker->text(200));  // Fake PDF for competence certificate

    // Generate fake images and store them in the correct directories
    $fakeImagePath1 = $this->faker->image(public_path('storage/uploads/self_pictures'), 640, 480, null, false);  // Fake self picture
    $fakeImagePath2 = $this->faker->image(public_path('storage/uploads/identity_cards'), 640, 480, null, false);  // Fake identity card

    // Ensure that image paths are valid before storing them
    if (!empty($fakeImagePath1)) {
        Storage::disk('public')->put($picturePath, file_get_contents(public_path('storage/uploads/self_pictures/' . $fakeImagePath1)));
    }
    if (!empty($fakeImagePath2)) {
        Storage::disk('public')->put($idCardPath, file_get_contents(public_path('storage/uploads/identity_cards/' . $fakeImagePath2)));
    }

    return [
        'career_id' => Career::factory(),
        'user_id' => User::factory(),
        'domicile' => $this->faker->city,
        'description' => $this->faker->paragraph,
        'resume' => $resumePath,  // Correct resume path
        'self_picture' => $picturePath,  // Correct self picture path
        'competence_certificate' => $certificatePath,  // Correct competence certificate path
        'identity_card' => $idCardPath,  // Correct identity card path
        'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
        'created_at' => now(),
        'updated_at' => now(),
    ];
}

}
