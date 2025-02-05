# Firebase CRUD Operations Cheat Sheet (JavaScript)

This guide provides a simplified overview of how to perform CRUD operations (Create, Read, Update, Delete) using **Firebase Firestore** and **Firebase Authentication** in a web app.

---

## 1. Setup Firebase in Your Project

Before using Firebase, you need to set up Firebase in your project. Below is the initialization process for Firebase Authentication and Firestore.

```javascript
// Import necessary Firebase SDKs
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import { getFirestore } from "firebase/firestore";

// Firebase configuration (replace with your Firebase project details)
const firebaseConfig = {
  apiKey: "your-api-key",
  authDomain: "your-auth-domain",
  projectId: "your-project-id",
  storageBucket: "your-storage-bucket",
  messagingSenderId: "your-messaging-sender-id",
  appId: "your-app-id",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// Initialize Firestore and Authentication
const db = getFirestore(app);
const auth = getAuth(app);
```

---

## 2. Firebase Authentication Functions

Firebase Authentication allows you to sign up, sign in, and manage user accounts.

### **Sign Up User (Email/Password)**

```javascript
import { createUserWithEmailAndPassword } from "firebase/auth";

const signUp = async (email, password) => {
  try {
    const userCredential = await createUserWithEmailAndPassword(auth, email, password);
    console.log('User Signed Up:', userCredential.user);
  } catch (error) {
    console.error('Sign up error:', error.message);
  }
};
```

### **Log In User (Email/Password)**

```javascript
import { signInWithEmailAndPassword } from "firebase/auth";

const signIn = async (email, password) => {
  try {
    const userCredential = await signInWithEmailAndPassword(auth, email, password);
    console.log('User Signed In:', userCredential.user);
  } catch (error) {
    console.error('Sign in error:', error.message);
  }
};
```

### **Log Out User**

```javascript
import { signOut } from "firebase/auth";

const logOut = async () => {
  try {
    await signOut(auth);
    console.log('User Signed Out');
  } catch (error) {
    console.error('Sign out error:', error.message);
  }
};
```

---

## 3. Firestore CRUD Operations

Here are the basic Firestore CRUD operations: Create, Read, Update, and Delete.

### **Create Data (Add Document)**

```javascript
import { collection, addDoc } from "firebase/firestore";

const createData = async () => {
  try {
    const docRef = await addDoc(collection(db, "users"), {
      name: "John Doe",
      email: "johndoe@example.com",
      age: 30
    });
    console.log("Document created with ID:", docRef.id);
  } catch (e) {
    console.error("Error adding document:", e);
  }
};
```

- This adds a new document to the `users` collection. Firestore auto-generates a unique document ID.

### **Read Data (Get All Documents)**

```javascript
import { collection, getDocs } from "firebase/firestore";

const getData = async () => {
  const querySnapshot = await getDocs(collection(db, "users"));
  querySnapshot.forEach((doc) => {
    console.log(doc.id, "=>", doc.data());
  });
};
```

- This retrieves all documents from the `users` collection.

### **Read Data (Get Specific Document by ID)**

```javascript
import { doc, getDoc } from "firebase/firestore";

const getSingleDocument = async (docId) => {
  const docRef = doc(db, "users", docId);
  const docSnap = await getDoc(docRef);

  if (docSnap.exists()) {
    console.log("Document data:", docSnap.data());
  } else {
    console.log("No such document!");
  }
};
```

- This retrieves a single document from the `users` collection using its document ID.

### **Update Data (Update Document)**

```javascript
import { doc, updateDoc } from "firebase/firestore";

const updateData = async (docId) => {
  const docRef = doc(db, "users", docId);
  
  try {
    await updateDoc(docRef, {
      age: 31  // Update the age
    });
    console.log("Document updated!");
  } catch (e) {
    console.error("Error updating document:", e);
  }
};
```

- This updates the `age` field for a specific document in the `users` collection.

### **Delete Data (Delete Document)**

```javascript
import { doc, deleteDoc } from "firebase/firestore";

const deleteData = async (docId) => {
  const docRef = doc(db, "users", docId);
  
  try {
    await deleteDoc(docRef);
    console.log("Document deleted!");
  } catch (e) {
    console.error("Error deleting document:", e);
  }
};
```

- This deletes a document from the `users` collection by document ID.

### **Real-Time Listener (Listen for Changes)**

```javascript
import { doc, onSnapshot } from "firebase/firestore";

const realTimeUpdates = (docId) => {
  const docRef = doc(db, "users", docId);
  onSnapshot(docRef, (docSnap) => {
    if (docSnap.exists()) {
      console.log("Real-time update:", docSnap.data());
    } else {
      console.log("No such document!");
    }
  });
};
```

- This listens for real-time updates to a specific document. Whenever the document is modified, the listener will be triggered.

---

## 4. Firebase CRUD Quick Reference

| **Action**                | **Function/Method**                      | **Example Code** |
|---------------------------|------------------------------------------|------------------|
| **Create (Add Document)**  | `addDoc()`                               | `addDoc(collection(db, "users"), { name, email })` |
| **Read (Get All Docs)**    | `getDocs()`                              | `getDocs(collection(db, "users"))` |
| **Read (Get Single Doc)**  | `getDoc()`                               | `getDoc(doc(db, "users", "docId"))` |
| **Update (Modify Doc)**    | `updateDoc()`                            | `updateDoc(doc(db, "users", "docId"), { age: 30 })` |
| **Delete (Remove Doc)**    | `deleteDoc()`                            | `deleteDoc(doc(db, "users", "docId"))` |
| **Real-Time Listener**     | `onSnapshot()`                           | `onSnapshot(doc(db, "users", "docId"), callback)` |

---

## 5. Example: Full CRUD Implementation

Here’s a simple example combining **Firestore CRUD** and **Firebase Authentication**.

```javascript
// Add User
const addUser = async () => {
  const docRef = await addDoc(collection(db, "users"), {
    name: "Alice",
    email: "alice@example.com",
    age: 28
  });
  console.log("User added with ID:", docRef.id);
};

// Get Users
const getUsers = async () => {
  const querySnapshot = await getDocs(collection(db, "users"));
  querySnapshot.forEach((doc) => {
    console.log(doc.id, "=>", doc.data());
  });
};

// Update User
const updateUser = async (docId) => {
  const docRef = doc(db, "users", docId);
  await updateDoc(docRef, {
    age: 29  // Update age
  });
  console.log("User updated!");
};

// Delete User
const deleteUser = async (docId) => {
  const docRef = doc(db, "users", docId);
  await deleteDoc(docRef);
  console.log("User deleted!");
};
```

---

## Conclusion

This README covers the basics of Firebase Authentication and Firestore CRUD operations for web applications. With Firebase Authentication, you can manage user accounts, while Firestore enables you to store and manage your application’s data efficiently.

---

## Resources

- [Firebase Documentation](https://firebase.google.com/docs)
- [Firestore Documentation](https://firebase.google.com/docs/firestore)
```
