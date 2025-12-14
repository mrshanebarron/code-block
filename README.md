# Laravel Design Code Block

Syntax highlighted code block component for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/code-block
```

## Usage

### Livewire Component

```blade
<livewire:ld-code-block />
```

### Blade Component

```blade
<x-ld-code-block />
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-code-block-config
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-code-block-views
```

## License

MIT
