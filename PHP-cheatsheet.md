
# PHP Cheat Sheet

## 1. Database Connection (MySQLi)

```php
// Database connection parameters
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'database_name';

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```

## 2. Running a Query

```php
$sql = "SELECT * FROM table_name";
$result = $conn->query($sql);

// Check if query was successful
if ($result) {
    // Fetch data
    while ($row = $result->fetch_assoc()) {
        echo "Column: " . $row["column_name"] . "<br>";
    }
} else {
    echo "Error: " . $conn->error;
}
```

## 3. Using `num_rows`

```php
// Count rows returned
$num_rows = $result->num_rows;
echo "Number of rows: " . $num_rows;
```

## 4. Closing the Connection

```php
$conn->close();
```

---

## 5. Session Management

1. **Starting a Session**

```php
session_start();
```

2. **Storing User Information in an Associative Array**

```php
$_SESSION['user'] = [
    'username' => 'john_doe',
    'email' => 'john@example.com',
    'role' => 'admin'
];
```

3. **Accessing Session Variables**

```php
if (isset($_SESSION['user'])) {
    echo "Welcome, " . $_SESSION['user']['username'];
    echo "Email: " . $_SESSION['user']['email'];
}
```

4. **Updating Session Variables**

```php
$_SESSION['user']['email'] = 'john.new@example.com';
```

5. **Unsetting a Specific Session Variable**

```php
unset($_SESSION['user']['role']); // Removes the 'role' key
```

6. **Destroying the Entire Session**

```php
session_start();
session_destroy();
```

---

## Summary

- **Database Operations**: Connect to MySQL using MySQLi, run queries, and use `num_rows` to count records.
- **Session Management**: Use associative arrays to store user data, access and modify session variables, and manage sessions effectively.

This cheat sheet provides the essential commands and methods for handling database interactions and sessions in PHP. Adjust the parameters and queries as needed for your specific application!

Feel free to copy and use this Markdown formatted cheat sheet as needed!
