<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GravatarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_generate_gravatar_defaul_image_when_no_email_found_first_character_a()
    {
        $user = User::factory()->create([
            'name' => 'Andrew',
            'email' => 'afakeemail@afakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'
            . md5($user->email)
            . '?s=200'
            . '&d=mp&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png',
            $gravatarUrl
        );

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_defaul_image_when_no_email_found_first_character_z()
    {
        $user = User::factory()->create([
            'name' => 'Zeb',
            'email' => 'zfakeemail@zfakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'
            . md5($user->email)
            . '?s=200'
            . '&d=mp&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png',
            $gravatarUrl
        );

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_defaul_image_when_no_email_found_first_character_0()
    {
        $user = User::factory()->create([
            'name' => 'Andrew',
            'email' => '007fakeemail@afakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'
            . md5($user->email)
            . '?s=200'
            . '&d=mp&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png',
            $gravatarUrl
        );

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_defaul_image_when_no_email_found_first_character_9()
    {
        $user = User::factory()->create([
            'name' => 'Andrew',
            'email' => '9fakeemail@afakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            'https://www.gravatar.com/avatar/'
            . md5($user->email)
            . '?s=200'
            . '&d=mp&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-36.png',
            $gravatarUrl
        );

        $response = Http::get($user->getAvatar());

        $this->assertTrue($response->successful());
    }
}
