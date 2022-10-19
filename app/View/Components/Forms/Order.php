<?php

namespace App\View\Components\Forms;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Order as modelOrder;
use Illuminate\View\Component;

class Order extends Component
{
    public modelOrder $order;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(modelOrder $order)
    {

        $this->order = $order;
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
