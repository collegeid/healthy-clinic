<?php
// add_admin_user.php
require 'priv/db.php';

// Define the admin credentials
$username = 'admin';
$password = 'admin';
$role = 'admin';
$id_karyawan = 1; // Example karyawan ID
$status_aktif = 1;

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    // Prepare the SQL statement
    $stmt = $pdo->prepare('INSERT INTO users (username, password, role, id_karyawan, status_aktif) VALUES (:username, :password, :role, :id_karyawan, :status_aktif)');
    
    // Execute the statement
    $stmt->execute([
        'username' => $username,
        'password' => $hashed_password,
        'role' => $role,
        'id_karyawan' => $id_karyawan,
        'status_aktif' => $status_aktif
    ]);

    echo "Admin user created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}



?>
