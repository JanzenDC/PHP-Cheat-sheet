
# PHP Session Management Cheat Sheet

## Starting a Session

To use sessions in PHP, you need to start the session at the beginning of your script:

```php
session_start();
```

## Setting Session Variables

You can store data in the session using the `$_SESSION` superglobal:

```php
$_SESSION['username'] = 'john_doe';
$_SESSION['email'] = 'john@example.com';
$_SESSION['role'] = 'admin';
```

## Accessing Session Variables

To retrieve session variables, use the same `$_SESSION` superglobal:

```php
if (isset($_SESSION['username'])) {
    echo "Welcome, " . $_SESSION['username'];
}
```

## Updating Session Variables

You can update session variables just like you would with any array:

```php
$_SESSION['email'] = 'john.new@example.com';
```

## Unsetting a Specific Session Variable

To remove a specific session variable, use `unset()`:

```php
unset($_SESSION['role']); // Removes the 'role' key
```

## Destroying the Entire Session

To completely destroy the session and all session data:

```php
session_start(); // Start the session
session_destroy(); // Destroy the session
```

### Example of Session Destruction

Here’s a full example that starts a session, sets some session variables, and then destroys the session:

```php
// Start the session
session_start();

// Set session variables
$_SESSION['username'] = 'john_doe';
$_SESSION['email'] = 'john@example.com';

// Display session variables
echo "Username: " . $_SESSION['username'] . "<br>";
echo "Email: " . $_SESSION['email'] . "<br>";

// Destroy the session
session_destroy();

// Check if session variables are still accessible
if (!isset($_SESSION['username'])) {
    echo "Session has been destroyed. User is logged out.";
} else {
    echo "Session still active.";
}
```

## Selecting Data from Database to Session

To retrieve user data from a database and store it in the session, you can do the following:

### Example Query

```php
// Database connection
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'database_name';

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session
session_start();

// Query to select user data
$sql = "SELECT username, email FROM users WHERE id = 1"; // Example: getting user with id = 1
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the user data
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['email'] = $row['email'];
    
    // Display session variables
    echo "Welcome, " . $_SESSION['username'] . "<br>";
    echo "Email: " . $_SESSION['email'] . "<br>";
} else {
    echo "No user found.";
}

// Close the connection
$conn->close();
```

## Summary

- **Starting a Session**: Use `session_start()` at the top of your script.
- **Managing Session Variables**: Use `$_SESSION` to set, access, update, and unset variables.
- **Destroying a Session**: Use `session_destroy()` to clear all session data and log the user out.
- **Database Interaction**: Retrieve data from a database and store it in session variables.

This cheat sheet provides the essential commands for handling sessions in PHP, including how to start, manage, destroy sessions, and store data retrieved from a database.
