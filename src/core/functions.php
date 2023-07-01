<?php
// pure function list

// Function to sanitize and escape user input
function clean_input($input): string
{
    global $db;
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $db->escapeString($input);
}

// Function to hash a password
function hash_password($password): string
{
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify a password
function verify_password($password, $hashed_password): bool
{
    return password_verify($password, $hashed_password);
}
