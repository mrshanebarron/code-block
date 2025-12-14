<template>
  <div class="relative rounded-lg bg-gray-900 overflow-hidden">
    <div v-if="filename || showCopyButton" class="flex items-center justify-between px-4 py-2 bg-gray-800 border-b border-gray-700">
      <span class="text-sm text-gray-400">{{ filename || language }}</span>
      <button v-if="showCopyButton" @click="copyCode" class="inline-flex items-center gap-1 px-2 py-1 text-xs text-gray-400 hover:text-white transition-colors">
        <svg v-if="!copied" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
        <svg v-else class="w-4 h-4 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
        <span>{{ copied ? 'Copied!' : 'Copy' }}</span>
      </button>
    </div>
    <div class="p-4 overflow-x-auto">
      <pre class="text-sm"><code class="text-gray-100 font-mono"><template v-if="showLineNumbers"><template v-for="(line, i) in lines" :key="i"><span class="select-none text-gray-500 mr-4">{{ String(i + 1).padStart(3, ' ') }}</span>{{ line }}
</template></template><template v-else>{{ code }}</template></code></pre>
    </div>
  </div>
</template>

<script>
import { ref, computed } from 'vue';

export default {
  name: 'LdCodeBlock',
  props: {
    code: { type: String, required: true },
    language: { type: String, default: 'plaintext' },
    showLineNumbers: { type: Boolean, default: true },
    showCopyButton: { type: Boolean, default: true },
    filename: { type: String, default: null }
  },
  setup(props) {
    const copied = ref(false);
    const lines = computed(() => props.code.split('\n'));
    const copyCode = async () => {
      await navigator.clipboard.writeText(props.code);
      copied.value = true;
      setTimeout(() => copied.value = false, 2000);
    };
    return { copied, lines, copyCode };
  }
};
</script>
