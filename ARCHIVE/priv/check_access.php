<?php
session_start();

if (!isset($_SESSION['role']) || empty($_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

$role = $_SESSION['role'];

function has_access($allowed_roles) {
    global $role;

    if (!in_array($role, $allowed_roles)) {
        echo '<p>Access Denied! You do not have permission to access this page.</p>';
        exit();  
    }
}
?>
