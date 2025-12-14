<div class="relative rounded-lg bg-gray-900 overflow-hidden">
    @if($filename || $showCopyButton)
        <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
            @if($filename)
                <span class="text-sm text-gray-400">{{ $filename }}</span>
            @else
                <span class="text-sm text-gray-400">{{ $language }}</span>
            @endif
            @if($showCopyButton)
                <button
                    type="button"
                    x-data="{ copied: false }"
                    @click="navigator.clipboard.writeText(@js($code)); copied = true; setTimeout(() => copied = false, 2000)"
                    class="inline-flex items-center gap-1 px-2 py-1 text-xs text-gray-400 hover:text-white transition-colors"
                >
                    <svg x-show="!copied" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                    <svg x-show="copied" class="w-4 h-4 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    <span x-text="copied ? 'Copied!' : 'Copy'"></span>
                </button>
            @endif
        </div>
    @endif

    <div class="p-4 overflow-x-auto">
        <pre class="text-sm"><code class="text-gray-100 font-mono">@if($showLineNumbers)@foreach(explode("\n", $code) as $i => $line)<span class="select-none text-gray-500 mr-4">{{ str_pad($i + 1, 3, ' ', STR_PAD_LEFT) }}</span>{{ $line }}
@endforeach @else{{ $code }}@endif</code></pre>
    </div>
</div>
