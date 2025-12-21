<div style="position: relative; border-radius: 8px; background: #111827; overflow: hidden;">
    @if($this->filename || $this->showCopyButton)
        <div style="display: flex; align-items: center; justify-content: space-between; padding: 8px 16px; background: #1f2937; border-bottom: 1px solid #374151;">
            @if($this->filename)
                <span style="font-size: 14px; color: #9ca3af;">{{ $this->filename }}</span>
            @else
                <span style="font-size: 14px; color: #9ca3af;">{{ $this->language }}</span>
            @endif
            @if($this->showCopyButton)
                <button
                    type="button"
                    x-data="{ copied: false }"
                    @click="navigator.clipboard.writeText(@js($this->code)); copied = true; setTimeout(() => copied = false, 2000)"
                    style="display: inline-flex; align-items: center; gap: 4px; padding: 4px 8px; font-size: 12px; color: #9ca3af; background: transparent; border: none; cursor: pointer; transition: color 0.15s;"
                    onmouseover="this.style.color='white'"
                    onmouseout="this.style.color='#9ca3af'"
                >
                    <svg x-show="!copied" style="width: 16px; height: 16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                    <svg x-show="copied" style="width: 16px; height: 16px; color: #4ade80;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    <span x-text="copied ? 'Copied!' : 'Copy'"></span>
                </button>
            @endif
        </div>
    @endif

    <div style="padding: 16px; overflow-x: auto;">
        <pre style="margin: 0; font-size: 14px;"><code style="color: #f3f4f6; font-family: monospace;">@if($this->showLineNumbers)@foreach(explode("\n", $this->code) as $i => $line)<span style="user-select: none; color: #6b7280; margin-right: 16px;">{{ str_pad($i + 1, 3, ' ', STR_PAD_LEFT) }}</span>{{ $line }}
@endforeach @else{{ $this->code }}@endif</code></pre>
    </div>
</div>
