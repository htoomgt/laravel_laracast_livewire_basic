<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PollExample extends Component
{
    public int $revenue;

    public function mount()
    {
        $this->getRevenue();
    }

    /**
     * To get total revenue of all orders
     * @return int revenue of orders
     */
    public function getRevenue()
    {

        $this->revenue = DB::table('orders')->sum('price');
    }

    public function render()
    {
        return view('livewire.poll-example');
    }
}
