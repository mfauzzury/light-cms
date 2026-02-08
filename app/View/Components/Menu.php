<?php

namespace App\View\Components;

use App\Models\Menu as MenuModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    public $menu;
    public $items;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $location = 'header')
    {
        $this->menu = MenuModel::where('location', $location)->first();
        $this->items = $this->menu ? $this->menu->rootItems()->with('children')->get() : collect();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu');
    }
}
