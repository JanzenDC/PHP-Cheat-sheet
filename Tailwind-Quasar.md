# Quasar + Tailwind CSS Integration

This guide walks you through setting up Tailwind CSS in a Quasar Framework project.

## Prerequisites

- Node.js and npm installed on your system.
- Basic familiarity with Quasar and Vue.js.

## 1. Install Quasar CLI and Initialize Project

```bash
# Install Quasar CLI globally
npm install -g @quasar/cli

# Create a new Quasar project
npm init quasar@latest
```

Follow the prompts to choose your preferred options (e.g., project name, ESLint settings, etc.).

## 2. Install Tailwind CSS

```bash
# Install Tailwind CSS as a development dependency
npm install -D tailwindcss@3

# Generate Tailwind config file
npx tailwindcss init
```

This creates a `tailwind.config.js` file at the root of your project.

## 3. Configure `tailwind.config.js`

Open `tailwind.config.js` and update the `content` paths to include your Vue and JS/TS files:

```js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.{vue,js,ts,jsx,tsx}',
    './index.html'
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

## 4. Create Tailwind Entry CSS

Create a new file at `src/css/tailwind.css` with the following contents:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## 5. Import Tailwind CSS into Quasar

In your main CSS file (`src/css/app.scss` or `src/css/app.css`), add:

```scss
@import './tailwind.css';
```

This ensures Tailwind’s styles are included in your build.

## 6. Update Quasar Configuration

Open `quasar.config.js` and ensure PostCSS is configured to use Tailwind and Autoprefixer:

```js
// quasar.config.js
module.exports = function (ctx) {
  return {
    // ... other Quasar config options ...

    build: {
      postCss: {
        plugins: {
          tailwindcss: {},
          autoprefixer: {}
        }
      }
    }
  }
}
```

## 7. Configure PostCSS (Optional)

If your project uses a standalone `postcss.config.js`, set it up like this:

```js
// postcss.config.js
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'

export default {
  plugins: [
    tailwindcss(),
    autoprefixer({
      overrideBrowserslist: [
        'last 4 Chrome versions',
        'last 4 Firefox versions',
        'last 4 Edge versions',
        'last 4 Safari versions',
        'last 4 Android versions',
        'last 4 ChromeAndroid versions',
        'last 4 FirefoxAndroid versions',
        'last 4 iOS versions'
      ]
    })
    // rtlcss() // Uncomment if you need RTL support
  ]
}
```

## 8. Verify and Start Development

Run the Quasar development server:

```bash
quasar dev
```

Then, in any Vue component, you can use Tailwind utility classes:

```vue
<template>
  <div class="bg-blue-500 text-white p-4">
    Tailwind is working with Quasar!
  </div>
</template>
```



