<?php

namespace MrShaneBarron\CodeBlock;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\CodeBlock\Livewire\CodeBlock;
use MrShaneBarron\CodeBlock\View\Components\CodeBlock as BladeCodeBlock;

class CodeBlockServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-code-block.php', 'sb-code-block');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-code-block');

        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-code-block', CodeBlock::class);
        }

        $this->loadViewComponentsAs('ld', [
            BladeCodeBlock::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-code-block.php' => config_path('sb-code-block.php'),
            ], 'sb-code-block-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/sb-code-block'),
            ], 'sb-code-block-views');
        }
    }
}
