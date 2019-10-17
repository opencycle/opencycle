<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Opencycle\User;
use Tests\TestCase;

class ImageTest extends TestCase
{
    /**
     * Test a user can upload an image.
     *
     * @return void
     */
    public function testUserCanUploadAnImage()
    {
        Storage::fake('public');

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('images.store'), [
            'name' => 'avatar.jpg',
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        $data = $response->decodeResponseJson();

        Storage::disk('public')->assertExists(parse_url($data['url'])['path']);
    }
}
