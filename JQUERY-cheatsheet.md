## Overview

This system allows users to add certificate records via an AJAX interface. When a user submits the form, the data is sent to the server for processing and stored in a database. Upon successful submission, a success message is displayed using SweetAlert, and the page reloads to reflect the updated data.

## Technologies Used

- **Frontend**:
  - **jQuery**: For making AJAX requests and manipulating the DOM.
  - **SweetAlert**: For displaying user-friendly notifications.
- **Backend**:
  - **PHP**: For handling the data processing and interacting with the database.
  - **MySQLi**: For interacting with the MySQL database.
- **Database**:
  - **MySQL**: For storing the certificate records.

## Frontend (HTML + JavaScript)

### HTML Structure

You need a basic form where users can input certificate information. Below is an example of the HTML structure for the form:

```html
<!-- Form to add certificate -->
<input type="text" id="editNoteId" placeholder="Certificate ID">
<textarea id="editNote" placeholder="Certificate Note"></textarea>
<button onclick="addRecord()">Submit</button>
```

### JavaScript for AJAX Submission

The following JavaScript function handles the AJAX request to send the data to the server:

```javascript
function addRecord() {
    const id = $("#editNoteId").val();  // Get the certificate ID
    const note = $("#editNote").val();  // Get the certificate note

    $.ajax({
        url: 'nx_query/certificate_bpermit.php?action=create',  // Server-side script
        type: 'POST',
        data: { id: id, note: note },
        success: function(response) {
            if (response.success) {
                // If the certificate was added successfully
                swal("Certificate marked as done successfully!", {
                    icon: "success",
                }).then(() => {
                    location.reload();  // Reload the page
                    $('#editCertificateDialog').dialog("close");  // Close the dialog if needed
                });
            } else {
                alert('Error: ' + response.message);  // Display error message
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', status, error);
            alert('Error updating certificate.');  // Display a general error message
        }
    });
}
```

### External Libraries

- **jQuery**: For AJAX calls.
- **SweetAlert**: For success messages.

```html
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
```

---

## Backend (PHP)

### PHP Script to Process Data

The PHP script `certificate_bpermit.php` processes the incoming AJAX request and interacts with the MySQL database. It is designed to handle the `create` action for adding new records.

```php
<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: application/json');

require "../../db_connect.php";  // Make sure this includes a valid MySQLi connection
$response = [
    'success' => false,
    'message' => '',
    'data' => null,
];

// Get the action parameter from the URL
$action = $_GET['action'] ?? '';
switch ($action) {
    case 'create':
        // Get data from POST request
        $id = $_POST['id'] ?? '';
        $note = $_POST['note'] ?? '';

        // Insert the new record into the database
        $query = "INSERT INTO certificates (certificate_id, certificate_note) VALUES ('$id', '$note')";
        if (mysqli_query($conn, $query)) {
            $response['success'] = true;
            $response['message'] = "Certificate marked as done successfully!";
        } else {
            $response['message'] = "Database error: " . mysqli_error($conn);
        }
        break;
    default:
        $response['message'] = "Invalid action.";
        break;
}

// Return JSON response
echo json_encode($response);
mysqli_close($conn);  // Close the database connection
?>
```

---

## Database Schema

Here’s an example of a simple database schema for storing certificates:

```sql
CREATE TABLE certificates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    certificate_id VARCHAR(255) NOT NULL,
    certificate_note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## How It Works

1. **Frontend Form**: The user enters the certificate ID and a note, then clicks "Submit."
2. **AJAX Request**: The data is sent to `certificate_bpermit.php?action=create` using jQuery's AJAX method.
3. **Backend Processing**: The PHP script inserts the new certificate into the database and returns a success or error message.
4. **SweetAlert Notification**: If the record is successfully added, a SweetAlert message is displayed to the user. The page reloads to show the updated list of certificates.

---

## Error Handling

- **AJAX Errors**: If there is an issue with the AJAX request, the error is logged, and a generic error message is shown to the user.
- **Server-Side Errors**: If the PHP script encounters an error (e.g., database issue), it returns an error message, which is displayed to the user.

---

## Requirements

- PHP 7.0 or higher
- MySQL database with the appropriate schema
- jQuery and SweetAlert for the frontend
- A valid database connection in `db_connect.php`

---

## Conclusion

This system allows users to add certificates using a simple AJAX interface, making it easy to integrate into your web applications. By handling the database operations via PHP and returning JSON responses, the system ensures seamless communication between the frontend and backend.
