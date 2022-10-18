<?php

namespace App\View\Components\Forms;

use App\Models\Order as ModelOrder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Order extends Component
{
    public ModelOrder $info ;
    public Collection $contents;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ModelOrder $info, Collection $contents)
    {

        $this->info = $info;
        $this->contents = $contents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.order');
    }
}
