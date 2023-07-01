<?php

namespace src\services;

use Exception;
use SQLite3;

class AuthService
{
    private SQLite3 $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    /**
     * @throws Exception
     */
    public function login(
        string $email_or_phone,
        string $password,
    ): array {
        $phone = preg_replace('/[^0-9.]+/', '', $email_or_phone);
        // Checking the existence of the user with the entered email
        $check_query = "SELECT * FROM users WHERE email = '{$email_or_phone}' OR phone = '{$phone}'";
        $check_result = $this->db->query($check_query);

        if ($check_result !== false && $user = $check_result->fetchArray(SQLITE3_ASSOC)) {
            // Verification of the entered password with a hash from the database
            if (password_verify($password, $user['password'])) {
                unset($user['password']);
                return $user;
            } else {
                throw new Exception("Wrong credentials");
            }
        } else {
            throw new Exception("Wrong credentials");
        }
    }

    /**
     * @throws Exception
     */
    public function signup(
        string $first_name,
        string $last_name,
        string $email,
        string $phone,
        string $password,
    ): array {
        // Check if a user with the same email or phone already exists
        $check_query = "SELECT * FROM users WHERE email = '{$email}' OR phone = '{$phone}'";

        $check_result = $this->db->query($check_query);

        if ($check_result !== false && $user = $check_result->fetchArray(SQLITE3_ASSOC)) {
            throw new Exception("A user with the same email or phone already exists.");
        } else {
            // Hash the password for secure storage
            $hashed_password = hash_password($password);

            // Add a new user to the database
            $insert_query = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES ('$first_name', '$last_name', '$email', '$phone', '{$hashed_password}')";

            if ($this->db->exec($insert_query)) {
                return [
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $email,
                    'phone' => $phone,
                ];
            } else {
                throw new Exception("Error during registration.");
            }
        }
    }
}
