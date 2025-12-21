# Code Block

A syntax-highlighted code block component for Laravel applications. Displays code with optional line numbers and copy functionality. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/code-block
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-code-block language="javascript">
    const greeting = "Hello, World!";
    console.log(greeting);
</livewire:sb-code-block>
```

### With Line Numbers

```blade
<livewire:sb-code-block language="php" :show-line-numbers="true">
    <?php
    namespace App\Http\Controllers;

    class HomeController extends Controller
    {
        public function index()
        {
            return view('home');
        }
    }
</livewire:sb-code-block>
```

### With Copy Button

```blade
<livewire:sb-code-block language="bash" :copyable="true">
    npm install @package/name
</livewire:sb-code-block>
```

### With Filename

```blade
<livewire:sb-code-block language="javascript" filename="app.js">
    import Vue from 'vue';
    const app = new Vue({ el: '#app' });
</livewire:sb-code-block>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `language` | string | `'text'` | Programming language |
| `show-line-numbers` | boolean | `false` | Show line numbers |
| `copyable` | boolean | `false` | Show copy button |
| `filename` | string | `null` | Display filename header |

## Vue 3 Usage

### Setup

```javascript
import { SbCodeBlock } from './vendor/sb-code-block';
app.component('SbCodeBlock', SbCodeBlock);
```

### Basic Usage

```vue
<template>
  <SbCodeBlock language="javascript" :code="code" />
</template>

<script setup>
const code = `function greet(name) {
  return \`Hello, \${name}!\`;
}`;
</script>
```

### With Options

```vue
<template>
  <SbCodeBlock
    language="typescript"
    :code="code"
    filename="types.ts"
    show-line-numbers
    copyable
  />
</template>
```

### Supported Languages

```vue
<template>
  <SbCodeBlock language="javascript" :code="jsCode" />
  <SbCodeBlock language="typescript" :code="tsCode" />
  <SbCodeBlock language="php" :code="phpCode" />
  <SbCodeBlock language="python" :code="pyCode" />
  <SbCodeBlock language="html" :code="htmlCode" />
  <SbCodeBlock language="css" :code="cssCode" />
  <SbCodeBlock language="bash" :code="bashCode" />
  <SbCodeBlock language="json" :code="jsonCode" />
  <SbCodeBlock language="sql" :code="sqlCode" />
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `code` | String | `''` | Code content |
| `language` | String | `'text'` | Language for highlighting |
| `showLineNumbers` | Boolean | `false` | Display line numbers |
| `copyable` | Boolean | `false` | Enable copy button |
| `filename` | String | `null` | Header filename |

### Events

| Event | Description |
|-------|-------------|
| `copy` | Code was copied |

## Supported Languages

- `javascript` / `js`
- `typescript` / `ts`
- `php`
- `python`
- `html`
- `css` / `scss` / `sass`
- `bash` / `shell`
- `json`
- `sql`
- `yaml`
- `markdown`
- `text` (no highlighting)

## Features

- **Syntax Highlighting**: Language-aware coloring
- **Line Numbers**: Optional line number gutter
- **Copy Button**: One-click copy to clipboard
- **Filename Header**: Optional file name display
- **Responsive**: Horizontal scroll for long lines

## Styling

Uses Tailwind CSS:
- Dark background (gray-900)
- Monospace font
- Colored syntax tokens
- Gray line numbers
- Rounded corners

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
