<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "siu_database";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari form
$nim = $_POST['nim'];
$name = $_POST['name'];

// Menyiapkan dan menjalankan query
$sql = "SELECT * FROM schedule WHERE nim = '$nim' AND name = '$name'";
$result = $conn->query($sql);

// Menampilkan hasil
if ($result->num_rows > 0) {
    echo "<h2>Jadwal Ujian</h2>";
    while($row = $result->fetch_assoc()) {
        echo "Mata Kuliah: " . $row["course"] . "<br>";
        echo "Tanggal: " . $row["date"] . "<br>";
        echo "Waktu: " . $row["time"] . "<br>";
        echo "Lokasi: " . $row["location"] . "<br>";
        echo "Sesi: " . $row["session"] . "<br><br>";
    }
} else {
    echo "Tidak ditemukan jadwal untuk NIM dan nama yang diberikan.";
}

// Menutup koneksi
$conn->close();
?>
