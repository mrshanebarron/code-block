<?php

namespace MrShaneBarron\code-block;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\code-block\Livewire\code-block;
use MrShaneBarron\code-block\View\Components\code-block as Bladecode-block;
use Livewire\Livewire;

class code-blockServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-code-block.php', 'ld-code-block');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-code-block');

        Livewire::component('ld-code-block', code-block::class);

        $this->loadViewComponentsAs('ld', [
            Bladecode-block::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-code-block.php' => config_path('ld-code-block.php'),
            ], 'ld-code-block-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-code-block'),
            ], 'ld-code-block-views');
        }
    }
}
