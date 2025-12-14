<div class="rounded-lg overflow-hidden bg-gray-900">
    @if($filename || $showCopy)
    <div class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
        @if($filename)
            <span class="text-sm text-gray-400">{{ $filename }}</span>
        @else
            <span class="text-sm text-gray-400">{{ $language }}</span>
        @endif
        @if($showCopy)
            <button
                x-data="{ copied: false }"
                @click="navigator.clipboard.writeText({{ json_encode($code) }}); copied = true; setTimeout(() => copied = false, 2000)"
                class="flex items-center gap-1 text-xs text-gray-400 hover:text-white transition-colors"
            >
                <template x-if="!copied">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                </template>
                <template x-if="copied">
                    <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </template>
                <span x-text="copied ? 'Copied!' : 'Copy'"></span>
            </button>
        @endif
    </div>
    @endif
    <div class="overflow-x-auto">
        <pre class="p-4 text-sm"><code class="language-{{ $language }} text-gray-100">{{ $code }}</code></pre>
    </div>
</div>
