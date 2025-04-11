
# ⚙️ Quasar Mobile App Build Guide (Android & iOS)

This guide walks you through building your **Quasar app** for **Android** and **iOS** using **Capacitor**.

---

## 🚀 Requirements

### ✅ General
- Node.js (v16+ recommended)
- Quasar CLI:  
  ```bash
  npm install -g @quasar/cli
  ```

### ✅ Android
- Android Studio
- Android SDK & Emulator
- Java Development Kit (JDK) 11 or 17
- USB debugging enabled (for real device testing)

### ✅ iOS (macOS only)
- Xcode
- CocoaPods  
  ```bash
  sudo gem install cocoapods
  ```

---

## 📦 Step 1: Install Capacitor Mode

Inside your Quasar project folder:

```bash
quasar mode add capacitor
```

You'll be prompted to choose a platform (select `android`, `ios`, or both).

---

## 🧱 Step 2: Build the Web Assets

Before running the native project, build your app:

```bash
quasar build
```

Or for production:

```bash
quasar build -m capacitor -T android
quasar build -m capacitor -T ios
```

---

## 📱 Step 3: Run on Android

### 1. Add Android Platform
```bash
npx cap add android
```

### 2. Sync Changes
```bash
npx cap sync android
```

### 3. Open Android Studio
```bash
npx cap open android
```

Then click **Run** in Android Studio to launch the app on emulator or device.

---

## 🍏 Step 4: Run on iOS (macOS only)

### 1. Add iOS Platform
```bash
npx cap add ios
```

### 2. Sync Changes
```bash
npx cap sync ios
```

### 3. Open Xcode
```bash
npx cap open ios
```

Then click **Run** in Xcode to launch the app on a simulator or real device.

---

## 🔁 Notes for Updating After Code Changes

1. Rebuild Quasar:
   ```bash
   quasar build
   ```

2. Sync with Capacitor:
   ```bash
   npx cap sync
   ```

3. Reopen Android Studio / Xcode or run:
   ```bash
   npx cap open android
   # or
   npx cap open ios
   ```

---

## 🔐 Signing & Publishing

- For Android:
  - Sign your app with a `.jks` file before uploading to the Play Store.
  - Use `Android Studio > Build > Generate Signed Bundle / APK`

- For iOS:
  - Use Xcode to configure certificates and provisioning profiles.

---

## 📚 Helpful Commands

| Command | Description |
|--------|-------------|
| `quasar build -m capacitor -T android` | Build for Android |
| `quasar build -m capacitor -T ios`     | Build for iOS |
| `npx cap sync`                         | Sync files to native platforms |
| `npx cap open android`                 | Open in Android Studio |
| `npx cap open ios`                     | Open in Xcode |

---

Let me know if you want a separate guide for publishing or debugging.
