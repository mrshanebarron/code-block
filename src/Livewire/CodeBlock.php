<?php

namespace MrShaneBarron\CodeBlock\Livewire;

use Livewire\Component;

class CodeBlock extends Component
{
    public string $code = '';
    public string $language = 'plaintext';
    public bool $showLineNumbers = true;
    public bool $showCopyButton = true;
    public ?string $filename = null;

    public function mount(string $code = '', string $language = 'plaintext', bool $showLineNumbers = true, bool $showCopyButton = true, ?string $filename = null): void
    {
        $this->code = $code;
        $this->language = $language;
        $this->showLineNumbers = $showLineNumbers;
        $this->showCopyButton = $showCopyButton;
        $this->filename = $filename;
    }

    public function render()
    {
        return view('ld-code-block::livewire.code-block');
    }
}
