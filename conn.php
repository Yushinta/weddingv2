<?php 
	session_start();
	$servername = "localhost";
				$username = "root";
				$password = "";
				$database = "undangan";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $database);

				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
					echo "Koneksi Gagal";
				}
				// echo "Connected successfully <br>";

				$queryGetData = "SELECT * FROM ucapan";
				$resultData = $conn->query($queryGetData);

	// initializing variables
	$nama = "";
	$pesan = "";

	if (isset($_POST['send'])) {
		$nama = $_POST['nama'];
		$pesan = $_POST['pesan'];
        
		mysqli_query($conn, "INSERT INTO ucapan (nama, pesan) VALUES ('$nama', '$pesan')" ); 
		$_SESSION['message'] = "Data saved"; 
		header('location: index.html');
	}
?>