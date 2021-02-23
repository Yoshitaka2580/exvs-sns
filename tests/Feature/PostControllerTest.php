<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class PostControllerTest extends TestCase
{
    /**
     * データベースをリセット
     */
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('posts.index'));

        //レスポンスを検証
        $response->assertStatus(200)
            ->assertViewIs('posts.index');
    }

    public function testGuestCreate()
    {
        $response = $this->get(route('posts.create'));

        //未ログインの場合リダイレクト
        $response->assertRedirect(route('home'));
    }

    public function testAuthCreate()
    {
        //Userモデルを準備
        $user = factory(User::class)->create();

        // ログインして記事投稿画面にアクセス
        $response = $this->actingAs($user)
            ->get(route('posts.create'));

        $response->assertStatus(200)
            ->assertViewIs('posts.create');
    }
}
