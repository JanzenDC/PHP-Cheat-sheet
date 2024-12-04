# Quasar + Tailwind CSS Installation Guide

## Prerequisites
- Node.js (version 16+ recommended)
- npm or Yarn
- Quasar CLI

## Step 1: Create a New Quasar Project
```bash
npm init quasar
# or
quasar create my-tailwind-project
```

## Step 2: Install Tailwind CSS and Dependencies
```bash
npm install -D tailwindcss postcss autoprefixer
# or
yarn add -D tailwindcss postcss autoprefixer
```

## Step 3: Generate Tailwind Configuration
```bash
npx tailwindcss init -p
```

## Step 4: Configure Tailwind for Quasar
Update `tailwind.config.js`:
```javascript
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

## Step 5: Create Tailwind CSS Entry File
Create `src/css/tailwind.css`:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## Step 6: Import Tailwind in Quasar Entry File
In `src/css/app.scss` or `src/css/app.css`:
```css
@import './tailwind.css';
```

## Step 7: Quasar Configuration
In `quasar.config.js`, ensure PostCSS is configured:
```javascript
module.exports = function (ctx) {
  return {
    // other configs...
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

## Step 8: Start Using Tailwind
Now you can use Tailwind classes in your Vue components:
```vue
<template>
  <div class="bg-blue-500 text-white p-4">
    Tailwind is working with Quasar!
  </div>
</template>
```

## Troubleshooting
- Ensure all dependencies are correctly installed
- Restart dev server after configuration changes
- Check console for any PostCSS or Tailwind-related errors

## Additional Resources
- [Quasar Documentation](https://quasar.dev)
- [Tailwind CSS Documentation](https://tailwindcss.com)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss proposed changes.

## License
[MIT](https://choosealicense.com/licenses/mit/)
