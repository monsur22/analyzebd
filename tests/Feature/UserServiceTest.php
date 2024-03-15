<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Http\Request;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $userService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userService = new UserService();
    }

    /** @test */
    public function it_can_create_a_user()
    {
        Storage::fake('images');

        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'image' => UploadedFile::fake()->image('avatar.jpg')
        ];

        $user = $this->userService->create($userData);

        $this->assertInstanceOf(User::class, $user);
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $request = Request::create(
            '/update-user/' . $user->id, // URL
            'PUT', // Method
            [
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
                'password' => 'updatedpassword',
            ],
            [],
            [],
            [
                'Content-Type' => 'multipart/form-data',
            ]
        );

        $updatedUser = $this->userService->update($request, $user->id);

        $this->assertInstanceOf(User::class, $updatedUser);
        $this->assertEquals('Updated Name', $updatedUser->name);
        $this->assertEquals('updated@example.com', $updatedUser->email);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $userService = new UserService();
        $userService->delete($user->id);

        $this->assertSoftDeleted('users', [
            'id' => $user->id,
        ]);

        if ($user->image) {
            $this->assertFileNotExists(public_path('images/' . $user->image));
        }
    }
}
