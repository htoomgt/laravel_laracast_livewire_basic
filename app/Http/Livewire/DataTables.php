<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class DataTables extends Component
{
    use WithPagination;

    public $search;
    public $active = true;
    public $sortField;
    public $sorAsc = true;
    protected $queryString = ['search', 'active', 'sortAsc', 'sortField'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.data-tables', [
            'users' => User::paginate(10),
            'users' => User::where(function($query){
                            $query->where('name', 'like', '%'.$this->search.'%')
                            ->orWhere('email', 'like', '%'.$this->search.'%');
                        })->where('active', $this->active)
                        ->where($this->sortField, function($query){
                            $query->orderBy($this->sortField, $this->sorAsc ? 'asc' : 'desc');
                        })->paginate(10),
        ]);
    }

   /*  public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    } */
}
