<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PollTest extends TestCase
{
    use RefreshDatabase;

    /**
     * To test poll example livewire component is seen in post page
     *
     * @return void
     */
    public function testPollPageContainPollExampleLivewireComponent()
    {
        $this->get(route('poll.example.show'))
            ->assertSeeLivewire('poll-example');

    }
}
