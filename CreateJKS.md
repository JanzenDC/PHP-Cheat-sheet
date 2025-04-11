# 📱 How to Create a JKS (Java KeyStore) using Android Studio

This guide will help you create a `.jks` file for signing your APK or Android App Bundle in Android Studio.

---

## 🔧 Steps to Create JKS in Android Studio

### 1. Open Android Studio
Launch your Android project in Android Studio.

### 2. Generate Signed Bundle or APK
- Go to `Build` > `Generate Signed Bundle / APK…`
- Choose one:
  - `Android App Bundle` (recommended for Play Store)
  - `APK` (for manual distribution)
- Click **Next**

### 3. Create a New Keystore
- Click the **Create new...** button beside the **Key store path** field.

### 4. Fill Out Key Information
Provide the following details:

| Field | Description |
|-------|-------------|
| **Key store path** | Location to save the `.jks` file |
| **Key store password** | A secure password for the keystore |
| **Key alias** | Name for the key (e.g., `release-key`) |
| **Key password** | Password for the key (can be same as above) |
| **Validity (years)** | Typically 25+ years |
| **Certificate info** | Personal or organization details |

### 5. Save and Continue
- Click **OK** to generate the keystore.
- Click **Next** to proceed.
- Choose `release` variant.
- Click **Finish**.

---

## 🛡️ Important Notes

- Keep your `.jks` file and passwords secure.
- Losing this file or forgetting the password means you cannot update your app on the Google Play Store with the same key.
- Backup the file in a secure, encrypted location.

---

## 🧪 Alternative (Command Line)

If needed, you can also generate the keystore manually:

```bash
keytool -genkey -v -keystore my-key.jks -keyalg RSA -keysize 2048 -validity 10000 -alias my-key
