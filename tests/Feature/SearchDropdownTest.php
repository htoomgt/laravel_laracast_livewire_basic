<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchDropdownTest extends TestCase
{

    /** @test */
    public function testDropdownPageContainSearchDropdownComponent()
    {
        $this->get('/dropdown_page')
            ->assertSeeLivewire('search-dropdown');
    }


    /** @test */
    public function testSearchDropdownSearchCorrectly()
    {
        Livewire::test(SearchDropdown::class)
            ->set('search', 'Imagine')
            ->assertSee('John Lennon');
    }

    /** @test */
    public function testSearchDropdownShowMessageIfNoSongExists()
    {
        Livewire::test(SearchDropdown::class)
            ->set('search', 'agwifwohfowhfohwowoefho3hhweoifweoh')
            ->assertSee('No results found for');
    }


}
