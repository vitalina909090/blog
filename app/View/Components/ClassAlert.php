<?php

namespace App\View\Components;

use App\Services\IconService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClassAlert extends Component
{
    public function __construct(
        public IconService $iconService,        // В начале внедрения!!!!

        public string $type = 'info',
        public string $message = '',
        public bool $dismissible = false,
    ) {}

    public function getIconClass(): string
    {
        return $this->iconService->getForType($this->type);
    }

    public function getColorClass(): string
    {
        return "alert-{$this->type}";
    }

    public function render(): View|Closure|string
    {
        // return '<div {{ $attributes }}>Content</div>';

//        return <<<'blade'
//            <div></div>
//        blade;


        return view('components.class-alert');
    }
}
