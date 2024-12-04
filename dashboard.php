<?php
session_start();
include("priv/check_access.php");
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}
$allowed_roles = ['dokter','perawat','resepsionis','kasir','admin'];
has_access($allowed_roles);

$role = $_SESSION['role'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to the Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <!-- Admin Menu -->
                    <?php if ($role === 'admin'): ?>
                        <li class="list-group-item">
                            <a href="./admin/profile_klinik.php" class="btn btn-info btn-block">Manage Clinic Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="users.php" class="btn btn-info btn-block">Manage Users</a>
                        </li>
                        <li class="list-group-item">
                            <a href="karyawan.php" class="btn btn-info btn-block">Manage Employees</a>
                        </li>
                        <li class="list-group-item">
                            <a href="jadwal_praktek.php" class="btn btn-info btn-block">Manage Schedule</a>
                        </li>
                        <li class="list-group-item">
                            <a href="pasien.php" class="btn btn-info btn-block">Manage Patients</a>
                        </li>
                        <li class="list-group-item">
                            <a href="kunjungan.php" class="btn btn-info btn-block">Manage Visits</a>
                        </li>
                        <li class="list-group-item">
                            <a href="resep_obat.php" class="btn btn-info btn-block">Manage Medication</a>
                        </li>
                        <li class="list-group-item">
                            <a href="detail_resep.php" class="btn btn-info btn-block">View Prescriptions</a>
                        </li>
                        <li class="list-group-item">
                            <a href="pembayaran.php" class="btn btn-info btn-block">Manage Payments</a>
                        </li>
                    <?php endif; ?>

                    <!-- Dokter Menu -->
                    <?php if ($role === 'dokter'): ?>
                        <li class="list-group-item">
                            <a href="kunjungan.php" class="btn btn-info btn-block">Manage Visits</a>
                        </li>
                        <li class="list-group-item">
                            <a href="detail_resep.php" class="btn btn-info btn-block">Manage Prescriptions</a>
                        </li>
                    <?php endif; ?>

                    <!-- Perawat Menu -->
                    <?php if ($role === 'perawat'): ?>
                        <li class="list-group-item">
                            <a href="kunjungan.php" class="btn btn-info btn-block">View Visits</a>
                        </li>
                        <li class="list-group-item">
                            <a href="detail_resep.php" class="btn btn-info btn-block">View Prescriptions</a>
                        </li>
                    <?php endif; ?>

                    <!-- Resepsionis Menu -->
                    <?php if ($role === 'resepsionis'): ?>
                        <li class="list-group-item">
                            <a href="pasien.php" class="btn btn-info btn-block">Manage Patients</a>
                        </li>
                        <li class="list-group-item">
                            <a href="kunjungan.php" class="btn btn-info btn-block">Schedule Visits</a>
                        </li>
                    <?php endif; ?>

                    <!-- Kasir Menu -->
                    <?php if ($role === 'kasir'): ?>
                        <li class="list-group-item">
                            <a href="pembayaran.php" class="btn btn-info btn-block">Manage Payments</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="col-md-9">
                <h3>Dashboard Content</h3>
                <!-- Add specific content for each user role here -->
            </div>
        </div>
    </div>
</body>
</html>
