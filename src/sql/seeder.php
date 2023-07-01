<?php
$db_file = 'db.sqlite'; // Replace with the path to your SQLite database file

$db = new SQLite3($db_file);

if (!$db) {
    die("Failed to connect to SQLite database");
}

// CREATE TABLE statement
$create_table_query = "
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        first_name TEXT NOT NULL,
        last_name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT NOT NULL,
        password TEXT NOT NULL
    )
";

// Execute the CREATE TABLE statement
if (!$db->exec($create_table_query)) {
    echo "Error creating table: " . $db->lastErrorMsg();
}

// Close the database connection
$db->close();

//// Sample data to insert
//$users = [
//    ['John', 'Doe', 'john@example.com', '1234567890', 'password1'],
//    ['Jane', 'Smith', 'jane@example.com', '0987654321', 'password2'],
//    // Add more users as needed
//];
//
//// Insert sample data into the users table
//foreach ($users as $user) {
//    $first_name = $db->escapeString($user[0]);
//    $last_name = $db->escapeString($user[1]);
//    $email = $db->escapeString($user[2]);
//    $phone = $db->escapeString($user[3]);
//    $password = $db->escapeString(password_hash($user[4], PASSWORD_DEFAULT));
//
//    $insert_query = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password')";
//
//    if ($db->exec($insert_query) === false) {
//        echo "Failed to insert user: " . $db->lastErrorMsg() . "\n";
//    }
//}
//
//$db->close();
?>
