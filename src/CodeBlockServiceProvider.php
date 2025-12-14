<?php

namespace MrShaneBarron\CodeBlock;

use Illuminate\Support\ServiceProvider;

class CodeBlockServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('ld-code-block', Livewire\CodeBlock::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-code-block');
    }
}
