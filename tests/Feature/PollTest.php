<?php

namespace Tests\Feature;

use App\Http\Livewire\PollExample;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
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


    /**
     * To test Poll Sum Order Correctly
     * @return void
     */
    public function testPollSumOrdersCorrectly()
    {
        $orderA = Order::create(['price' => 20]);
        $orderB = Order::create(['price' => 20]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSee('$40');

        $orderC = Order::create(['price' => 20]);

        Livewire::test(PollExample::class)
            ->call('getRevenue')
            ->assertSee('$60');
    }
}
