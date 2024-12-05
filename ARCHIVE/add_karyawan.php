
// Define karyawan details
$nama_karyawan = 'Admin Karyawan';
$jabatan = 'admin'; // Can be any value, e.g. 'admin'
$nomor_telepon = '1234567890';
$email = 'admin@example.com';
$status_aktif = 1; // Assuming the employee is active

// Prepare the SQL statement to insert the karyawan
$stmt = $pdo->prepare('INSERT INTO karyawan (nama_karyawan, jabatan, nomor_telepon, email, status_aktif) VALUES (:nama_karyawan, :jabatan, :nomor_telepon, :email, :status_aktif)');

// Execute the statement
$stmt->execute([
    'nama_karyawan' => $nama_karyawan,
    'jabatan' => $jabatan,
    'nomor_telepon' => $nomor_telepon,
    'email' => $email,
    'status_aktif' => $status_aktif
]);

echo "Karyawan added successfully.";