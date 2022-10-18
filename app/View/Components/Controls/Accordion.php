<?php

namespace App\View\Components\Controls;

use Illuminate\View\Component;

class Accordion extends Component
{
    public ?string $id = null;
    public bool $collapsed = true;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $id = null, $collapsed = true)
    {
        if ($id===null){
            $this->id =  bin2hex(random_bytes(4));
        } else $this->id = $id;

        $this->collapsed = $collapsed;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.controls.accordion');
    }
}
