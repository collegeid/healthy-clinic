<?php

session_start();
include("../priv/check_access.php");
include("../priv/db.php");  
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
} else{
    $allowed_roles = ['admin'];
    has_access($allowed_roles);

}


function getClinicProfile($pdo) {
    $stmt = $pdo->query("SELECT * FROM profile_klinik WHERE id_klinik = 1");
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['create'])) {
    $nama_klinik = $_POST['nama_klinik'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    $stmt = $pdo->prepare("INSERT INTO profile_klinik (nama_klinik, alamat, nomor_telepon, email, website) 
                           VALUES (:nama_klinik, :alamat, :nomor_telepon, :email, :website)");
    $stmt->execute(['nama_klinik' => $nama_klinik, 'alamat' => $alamat, 'nomor_telepon' => $nomor_telepon, 
                    'email' => $email, 'website' => $website]);
    echo "Profile Created Successfully!";
}

if (isset($_POST['update'])) {
    $id_klinik = $_POST['id_klinik'];
    $nama_klinik = $_POST['nama_klinik'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $email = $_POST['email'];
    $website = $_POST['website'];

    $stmt = $pdo->prepare("UPDATE profile_klinik SET nama_klinik = :nama_klinik, alamat = :alamat, 
                           nomor_telepon = :nomor_telepon, email = :email, website = :website WHERE id_klinik = :id_klinik");
    $stmt->execute(['nama_klinik' => $nama_klinik, 'alamat' => $alamat, 'nomor_telepon' => $nomor_telepon, 
                    'email' => $email, 'website' => $website, 'id_klinik' => $id_klinik]);
    echo "Profile Updated Successfully!";
}

if (isset($_POST['delete'])) {
    $id_klinik = $_POST['id_klinik'];

    $stmt = $pdo->prepare("DELETE FROM profile_klinik WHERE id_klinik = :id_klinik");
    $stmt->execute(['id_klinik' => $id_klinik]);
    echo "Profile Deleted Successfully!";
}

$clinicProfile = getClinicProfile($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Clinic Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Manage Clinic Profile</h1>
        <?php if ($clinicProfile): ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_klinik">Clinic Name</label>
                <input type="text" class="form-control" id="nama_klinik" name="nama_klinik" value="<?php echo $clinicProfile['nama_klinik']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Address</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $clinicProfile['alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Phone Number</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?php echo $clinicProfile['nomor_telepon']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $clinicProfile['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" name="website" value="<?php echo $clinicProfile['website']; ?>">
            </div>
            <input type="hidden" name="id_klinik" value="<?php echo $clinicProfile['id_klinik']; ?>">

            <button type="submit" name="update" class="btn btn-primary">Update Profile</button>
            <button type="submit" name="delete" class="btn btn-danger">Delete Profile</button>
        </form>
        <?php else: ?>

        <h2>Create New Profile</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nama_klinik">Clinic Name</label>
                <input type="text" class="form-control" id="nama_klinik" name="nama_klinik" required>
            </div>
            <div class="form-group">
                <label for="alamat">Address</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Phone Number</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" class="form-control" id="website" name="website">
            </div>
            <button type="submit" name="create" class="btn btn-success">Create Profile</button>
        </form>
        <?php endif; ?>

    </div>
</body>
</html>
