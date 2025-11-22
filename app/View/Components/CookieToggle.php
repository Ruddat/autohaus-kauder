<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CookieToggle extends Component
{
    public $label;
    public $description;
    public $id;
    public $disabled;
    public $checked;

    public function __construct(
        $label = '',
        $description = '',
        $id = '',
        $disabled = false,
        $checked = false
    ) {
        $this->label = $label;
        $this->description = $description;
        $this->id = $id;
        $this->disabled = $disabled;
        $this->checked = $checked;
    }

    public function render()
    {
        return view('components.cookie-toggle');
    }
}
