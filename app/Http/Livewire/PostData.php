<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PostData extends Component
{
    use WithPagination;

    public $search;
    public $page = 1;

    protected $updatesQueryString = [
        ['page' => ['except' => 1]],
        ['search' => ['except' => '']],
    ];

    protected $listeners = [
        'studentAdded',
    ];

    public function studentAdded()
    {
        # code...
    }

    public function render()
    {
        $students = DB::latest()->paginate(5);

        if ($this->search !== null) {
            $students = Student::where('name', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate(5);
        }

        return view('livewire.student-index',  [
            'students' => $students,
        ]);
    }
}
