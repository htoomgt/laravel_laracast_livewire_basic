<?php

namespace Tests\Feature;

use App\Http\Livewire\TagsComponents;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TagsComponentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function testEventPageContainTagsComponentsLivewireComponent()
    {
        $this->get("/event-page")
            ->assertSeeLivewire('tags-components');
    }

    /**
     * @test
     */
    public function testLoadExistingTagsCorrectly()
    {
        $tagA = Tag::create(['name' => 'one']);
        $tagB = Tag::create(['name' => 'two']);

        Livewire::test(TagsComponents::class)
            ->assertSet('tags', json_encode(['one', 'two']));
    }

    /**
     * @test
     */
    public function testAddTagsCorrectly()
    {
        $tagA = Tag::create(['name' => 'one']);
        $tagB = Tag::create(['name' => 'two']);

        Livewire::test(TagsComponents::class)
            ->emit('tagAdded', 'three')
            ->assertEmitted('tagAddedFromBackend', 'three');

        $this->assertDatabaseHas('tags', ['name' => 'three']);
    }

    /**
     * @test
     */
    public function testRemoveTagsCorrectly()
    {
        $tagA = Tag::create(['name' => 'one']);
        $tagB = Tag::create(['name' => 'two']);

        Livewire::test(TagsComponents::class)
            ->emit('tagRemoved', 'two');


        $this->assertDatabaseMissing('tags', ['name' => 'two']);
    }


}
