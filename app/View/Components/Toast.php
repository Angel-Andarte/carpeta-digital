<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Toast extends Component
{
    public $title;
    public $message;
    public $duration;
    public $time;

    public function __construct($title = 'Éxito', $message = '', $duration = 5000)
    {
        $this->title = $title;
        $this->message = $message;
        $this->duration = $duration;
        $this->time = now()->format('H:i');
    }

    public function render()
    {
        return view('components.toast');
    }
}
