<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContentHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public string $iconClasses;

    public function __construct(string $iconClasses)
    {
        $this->iconClasses = $iconClasses;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.content-header',['iconClasses'=>$this->iconClasses]);
    }
}
