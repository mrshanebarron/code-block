<?php

namespace MrShaneBarron\CodeBlock\Livewire;

use Livewire\Component;

class CodeBlock extends Component
{
    public string $code = '';
    public string $language = 'php';
    public bool $showLineNumbers = true;
    public bool $showCopy = true;
    public ?string $filename = null;
    public ?int $highlightLines = null;

    public function mount(
        string $code = '',
        string $language = 'php',
        bool $showLineNumbers = true,
        bool $showCopy = true,
        ?string $filename = null,
        ?int $highlightLines = null
    ): void {
        $this->code = $code;
        $this->language = $language;
        $this->showLineNumbers = $showLineNumbers;
        $this->showCopy = $showCopy;
        $this->filename = $filename;
        $this->highlightLines = $highlightLines;
    }

    public function render()
    {
        return view('ld-code-block::livewire.code-block');
    }
}
