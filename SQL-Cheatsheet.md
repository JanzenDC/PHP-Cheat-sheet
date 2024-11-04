# SQL Cheat Sheet

## CRUD Operations

### 1. Create (INSERT)

```sql
INSERT INTO table_name (column1, column2, column3)
VALUES (value1, value2, value3);
```

### 2. Read (SELECT)

```sql
-- Select all columns
SELECT * FROM table_name;

-- Select specific columns
SELECT column1, column2 FROM table_name;

-- Adding conditions
SELECT * FROM table_name WHERE condition;
```

### 3. Update

```sql
UPDATE table_name
SET column1 = value1, column2 = value2
WHERE condition;
```

### 4. Delete

```sql
DELETE FROM table_name
WHERE condition;
```

---

## JOIN Queries

### 1. INNER JOIN

```sql
SELECT a.column1, b.column2
FROM table1 a
INNER JOIN table2 b ON a.common_column = b.common_column;
```

### 2. LEFT JOIN (LEFT OUTER JOIN)

```sql
SELECT a.column1, b.column2
FROM table1 a
LEFT JOIN table2 b ON a.common_column = b.common_column;
```

### 3. RIGHT JOIN (RIGHT OUTER JOIN)

```sql
SELECT a.column1, b.column2
FROM table1 a
RIGHT JOIN table2 b ON a.common_column = b.common_column;
```

### 4. FULL JOIN (FULL OUTER JOIN)

```sql
SELECT a.column1, b.column2
FROM table1 a
FULL OUTER JOIN table2 b ON a.common_column = b.common_column;
```

### 5. CROSS JOIN

```sql
SELECT a.column1, b.column2
FROM table1 a
CROSS JOIN table2 b;
```

---

## Summary

- **CRUD Operations**: Use `INSERT` to create, `SELECT` to read, `UPDATE` to modify, and `DELETE` to remove data.
- **JOIN Queries**: Use `INNER JOIN`, `LEFT JOIN`, `RIGHT JOIN`, `FULL JOIN`, and `CROSS JOIN` to combine rows from two or more tables based on related columns.

---

## Executing SQL Queries in PHP

### 1. Database Connection

```php
$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'database_name';

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```

### 2. Executing CRUD Operations

#### Create (INSERT)

```php
$sql = "INSERT INTO table_name (column1, column2) VALUES ('value1', 'value2')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
```

#### Read (SELECT)

```php
$sql = "SELECT * FROM table_name";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Column: " . $row["column_name"] . "<br>";
    }
} else {
    echo "0 results";
}
```

#### Update

```php
$sql = "UPDATE table_name SET column1 = 'new_value' WHERE condition";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
```

#### Delete

```php
$sql = "DELETE FROM table_name WHERE condition";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
```

### 3. Executing JOIN Queries

```php
$sql = "SELECT a.column1, b.column2 FROM table1 a INNER JOIN table2 b ON a.common_column = b.common_column";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Column1: " . $row["column1"] . " - Column2: " . $row["column2"] . "<br>";
    }
} else {
    echo "0 results";
}
```

### 4. Closing the Connection

```php
$conn->close();
```

---

This cheat sheet provides essential SQL commands for performing CRUD operations and joining tables, along with PHP code snippets to execute these queries. Adjust the table and column names according to your database schema!

Feel free to copy and use this SQL cheat sheet as needed!
