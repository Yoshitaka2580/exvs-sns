<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Post;
use App\User;

class PostTest extends TestCase
{
    use RefreshDatabase;

    // public function testIsLikedByNull()
    // {
    //     $post = factory(Post::class)->create();

    //     $result = $post->isLikedBy(null);

    //     $this->assertFalse($result);
    // }

    // public function testIsLikedByTheUser()
    // {
    //     $post = factory(Post::class)->create();
    //     $user = factory(User::class)->create();
    //     $post->likes()->attach($user);

    //     $result = $post->isLikedBy($user);

    //     $this->assertTrue($result);
    // }

    // public function testIsLikedByAnother()
    // {
    //     $post = factory(Post::class)->create();
    //     $user = factory(User::class)->create();
    //     $another = factory(User::class)->create();
    //     $post->likes()->attach($another);

    //     $result = $post->isLikedBy($user);

    //     $this->assertFalse($result);
    // }
}
