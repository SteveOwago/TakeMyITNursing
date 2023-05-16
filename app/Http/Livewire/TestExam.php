<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class TestExam extends Component
{

    public $currentStep = 1;
    public $questions = [];
    public $answers = [];

    public function mount()
    {
        // Retrieve questions from the database
        $this->questions = Question::all();
    }

    public function render()
    {
        return view('livewire.test-exam');
    }

    public function submit()
    {
        // Save the answers to the database or perform any other necessary action
        // You can access the submitted answers using $this->answers array
    }

    public function updated($propertyName)
    {
        $this->emit('currentStepUpdated', $this->currentStep);
    }
}
