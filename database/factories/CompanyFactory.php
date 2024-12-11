<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use Intervention\Image\src\Image;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generate base components for the company name
        $mainPart = $this->faker->randomElement([
            $this->faker->company,         // Company generator
            $this->faker->lastName,        // Use a last name
            $this->faker->city,            // Use a city name
            ucfirst($this->faker->word),   // Capitalise a random word
        ]);

        $secondaryPart = $this->faker->optional(0.7)->randomElement([
            'Solutions', 'Enterprises', 'Industries', 'Partners', 'Ventures',
            'Consulting', 'Group', 'Technologies', 'Systems', 'Network',
        ]);

        $symbolicPart = $this->faker->optional(0.5)->randomElement([
            '& Sons', '& Daughters', '& Co.', 'Worldwide', 'International',
        ]);

        // Add variation with optional suffixes
        $suffixes = ['LLC', 'Group', 'Corp', 'Holdings', '']; // '' allows no suffix
        $suffix = $this->faker->randomElement($suffixes);

        // Construct the final company name
        $companyName = $mainPart;
        if ($secondaryPart) {
            $companyName .= ' ' . $secondaryPart;
        }
        if ($symbolicPart) {
            $companyName .= ' ' . $symbolicPart;
        }
        if (!empty($suffix)) { // Only add if suffix is not an empty string
            $companyName .= ' ' . $suffix;
        }

        // Slugify the company name for email and website
        $slug = Str::slug($mainPart, '') . Str::slug($secondaryPart ?? '', '') . Str::slug($symbolicPart ?? '', '');

        // Random domain extension
        $domainExtensions = ['.com', '.co.uk', '.org', '.net'];
        $domainExtension = $this->faker->randomElement($domainExtensions);

        // Generate the email
        $email = 'info@' . $slug . $domainExtension;

        // Generate the website URL based on the email domain
        $website = 'https://www.' . $slug . $domainExtension;

         // Fetch all SVG files in the storage/public/logos directory
         $logos = Storage::disk('public')->files('logos');
         $randomLogo = $this->faker->randomElement($logos);

         // Prepare new logo path
        $resizedLogoPath = 'logos/resized_' . basename($randomLogo);

        // Resize the logo to 100x100 and save it
        $logoContents = Storage::disk('public')->get($randomLogo);
        $resizedImage = Image::make($logoContents)->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Storage::disk('public')->put($resizedLogoPath, $resizedImage->encode());

        return [
            'name' => $companyName,
            'email' => $email,
            'logo' => $resizedLogoPath,
            'website' => $website,
        ];
    }
}
