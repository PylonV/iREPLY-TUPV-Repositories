<?php

namespace App\Livewire;

use Livewire\Component;

class ApplicantsTable extends Component
{
    public $applicants;

    public function mount($applicants = null)
    {
        $this->applicants = $applicants;
    }

    public function render()
    {
        return view('livewire.applicants-table');
    }
}
