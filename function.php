<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apk_sarpras";

$conn = mysqli_connect($servername, $username, $password, $dbname);
 if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
 }
 else {

 }

 if (isset($_POST['btn_pinjam_barang'])) {
  $id_barang = $_POST['id_barang'];
  $id_siswa = $_POST['id_siswa'];
  $quantity = $_POST['jumlah'];

  // Validate the id_siswa
  $siswa_query = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'";
  $siswa_result = mysqli_query($conn, $siswa_query);

  if (mysqli_num_rows($siswa_result) > 0) {
      // Fetch the current stock of the item
      $query = "SELECT stock_barang FROM barang WHERE id_barang = '$id_barang'";
      $result = mysqli_query($conn, $query);
      if ($result) {
          $row = mysqli_fetch_assoc($result);
          $current_stock = $row['stock_barang'];

          if ($current_stock >= $quantity) {
              // Reduce the stock
              $new_stock = $current_stock - $quantity;
              $update_query = "UPDATE barang SET stock_barang = '$new_stock' WHERE id_barang = '$id_barang'";
              if (mysqli_query($conn, $update_query)) {
                  // Insert into peminjaman table
                  $insert_query = "INSERT INTO data_pinjam (id_barang, id_siswa, jumlah, tgl_pinjam) VALUES ('$id_barang', '$id_siswa', '$quantity', NOW())";
                  if (mysqli_query($conn, $insert_query)) {
                      echo "Peminjaman berhasil.";
                  } else {
                      echo "Error: " . mysqli_error($conn);
                  }
              } else {
                  echo "Error: " . mysqli_error($conn);
              }
          } else {
              echo "Stok tidak mencukupi.";
          }
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  } else {
      echo "Invalid student ID.";
  }

} else {

}

if (isset($_POST['btn_pinjam_ruang'])) {
  $id_ruang = $_POST['id_ruang'];
  $id_siswa_ruang = $_POST['id_siswa'];
  $quantity_ruang = $_POST['jumlah'];

  // Validate the id_siswa
  $siswa_query_ruang = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa_ruang'";
  $siswa_result_ruang = mysqli_query($conn, $siswa_query_ruang);

  if (mysqli_num_rows($siswa_result_ruang) > 0) {
      // Fetch the current stock of the item
      $query_ruang = "SELECT stock_ruang FROM ruang WHERE id_ruang = '$id_ruang'";
      $result_ruang = mysqli_query($conn, $query_ruang);
      if ($result_ruang) {
          $row = mysqli_fetch_assoc($result_ruang);
          $current_stock_ruang = $row['stock_ruang'];

          if ($current_stock_ruang >= $quantity_ruang) {
              // Reduce the stock
              $new_stock_ruang = $current_stock_ruang - $quantity_ruang;
              $update_query_ruang = "UPDATE ruang SET stock_ruang = '$new_stock_ruang' WHERE id_ruang = '$id_ruang'";
              if (mysqli_query($conn, $update_query_ruang)) {
                  // Insert into peminjaman table
                  $insert_query_ruang = "INSERT INTO data_pinjam_ruang (id_ruang, id_siswa, jumlah, tgl_pinjam) VALUES ('$id_ruang', '$id_siswa_ruang', '$quantity_ruang', NOW())";
                  if (mysqli_query($conn, $insert_query_ruang)) {
                      echo "Peminjaman berhasil.";
                  } else {
                      echo "Error: " . mysqli_error($conn);
                  }
              } else {
                  echo "Error: " . mysqli_error($conn);
              }
          } else {
              echo "Stok tidak mencukupi.";
          }
      } else {
          echo "Error: " . mysqli_error($conn);
      }
  } else {
      echo "Invalid student ID.";
  }

} else {

}



 function fetchData($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function executeQuery($query) {
  global $conn;
  return mysqli_query($conn, $query);
}

 if(isset($_POST['btn_submit'])){
  $nama_barang = $_POST['nama'];
  $desc_barang = $_POST['deskripsi'];
  $stock_barang = $_POST['stock'];

  $sql = "INSERT INTO barang (nama_barang, desc_barang, stock_barang) VALUES ('$nama_barang', '$desc_barang', '$stock_barang')";

  if (mysqli_query($conn, $sql)) {
     $sql = "SELECT * FROM barang ORDER BY id_barang DESC LIMIT 1";
     $result = mysqli_query($conn, $sql);
     $data_id_barang = "";
     if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $data_id_barang = $row['id_barang'];
        }
      } else {
        echo "0 results";
      }
  }
}

if (isset($_POST['btn_hapus'])) {
  $id_hapus = $_POST['id_hapus'];

  // sql to delete a record
  $sql_hapus = "DELETE FROM barang WHERE id_barang = '$id_hapus'";

  if ($conn->query($sql_hapus) === TRUE) {
      echo "Record deleted successfully";
      header('Location: barangAdmin.php');
  } else {
      echo "Error deleting record: " . $conn->error;
  }
}

if (isset($_POST['btn_edit'])) {
  // Ambil data dari formulir
  $id_edit = isset($_POST['id_edit']) ? $_POST['id_edit'] : null;
  $data_nama_barang = isset($_POST['nama']) ? $_POST['nama'] : null;
  $data_deskripsi = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : null;
  $data_stock = $_POST['stock'];

  // Validasi data POST
  if (!$id_edit || !$data_nama_barang || !$data_deskripsi || !$data_stock) {
      echo "Ada data yang kurang dari formulir.";
      exit;
  }

  // Query update data barang dengan prepared statement
  $sql_update_barang = "UPDATE barang 
                        SET nama_barang = ?, 
                            desc_barang = ?, 
                            stock_barang = ? 
                        WHERE id_barang = ?";

  // Persiapkan statement SQL
  $stmt = mysqli_prepare($conn, $sql_update_barang);
  if ($stmt === false) {
      echo "Error preparing statement: " . mysqli_error($conn);
      exit;
  }

  // Bind parameter ke statement
  mysqli_stmt_bind_param($stmt, "ssii", $data_nama_barang, $data_deskripsi, $data_stock, $id_edit);

  // Eksekusi statement
  if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_close($stmt);
      header('Location: barangAdmin.php'); // Redirect ke halaman barang dengan status sukses
      exit();
  } else {
      echo "Error executing statement: " . mysqli_stmt_error($stmt); // Tampilkan pesan error jika execute gagal
  }
} else {
 
}

     
if(isset($_POST['btn_submit_ruang'])){
  $nama_ruang = $_POST['nama'];
  $desc_ruang = $_POST['deskripsi'];
  $stock_ruang = $_POST['stock'];

  $sql = "INSERT INTO ruang (nama_ruang, desc_ruang, stock_ruang) VALUES ('$nama_ruang', '$desc_ruang', '$stock_ruang')";

  if (mysqli_query($conn, $sql)) {
     $sql = "SELECT * FROM ruang ORDER BY id_ruang DESC LIMIT 1";
     $result = mysqli_query($conn, $sql);
     $data_id_ruang = "";
     if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $data_id_ruang = $row['id_ruang'];
        }
      } else {
        echo "0 results";
      }
  }
}

if (isset($_POST['btn_hapus_ruang'])) {
  $id_hapus_ruang = $_POST['id_hapus_ruang'];

  // sql to delete a record
  $sql_hapus_ruang = "DELETE FROM ruang WHERE id_ruang = '$id_hapus_ruang'";

  if ($conn->query($sql_hapus_ruang) === TRUE) {
      echo "Record deleted successfully";
      header('Location: ruangAdmin.php');
  } else {
      echo "Error deleting record: " . $conn->error;
  }
}

if (isset($_POST['btn_edit_ruang'])) {
  // Ambil data dari formulir
  $id_edit_ruang = isset($_POST['id_edit']) ? $_POST['id_edit'] : null;
  $data_nama_ruang = isset($_POST['nama']) ? $_POST['nama'] : null;
  $data_desc_ruang = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : null;
  $data_stock_ruang = $_POST['stock'];

  // Validasi data POST
  if (!$id_edit_ruang || !$data_nama_ruang || !$data_desc_ruang || !$data_stock_ruang) {
      echo "Ada data yang kurang dari formulir.";
      exit;
  }

  // Query update data barang dengan prepared statement
  $sql_update_barang = "UPDATE ruang
                        SET nama_ruang = ?, 
                            desc_ruang = ?, 
                            stock_ruang = ? 
                        WHERE id_ruang = ?";

  // Persiapkan statement SQL
  $stmt = mysqli_prepare($conn, $sql_update_barang);
  if ($stmt === false) {
      echo "Error preparing statement: " . mysqli_error($conn);
      exit;
  }

  // Bind parameter ke statement
  mysqli_stmt_bind_param($stmt, "ssii", $data_nama_ruang, $data_desc_ruang, $data_stock_ruang, $id_edit_ruang);

  // Eksekusi statement
  if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_close($stmt);
      header('Location: ruangAdmin.php'); // Redirect ke halaman barang dengan status sukses
      exit();
  } else {
      echo "Error executing statement: " . mysqli_stmt_error($stmt); // Tampilkan pesan error jika execute gagal
  }
} else {
 
}


if(isset($_POST['btn_submit_dtPeminjam'])){
  $username = $_POST['username'];
  $pass_peminjam = $_POST['pass'];
  $nama_peminjam = $_POST['nm_peminjam'];
  $email_peminjam = $_POST['email'];

  $sql = "INSERT INTO siswa (username, password, nama_siswa, email_siswa) VALUES ('$username', '$pass_peminjam', '$nama_peminjam', '$email_peminjam')";

  if (mysqli_query($conn, $sql)) {
     $sql = "SELECT * FROM siswa ORDER BY id_siswa DESC LIMIT 1";
     $result = mysqli_query($conn, $sql);
     $data_id_ruang = "";
     if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          $data_id_ruang = $row['id_siswa'];
        }
      } else {
        echo "0 results";
      }
  }
}

if (isset($_POST['btn_hapus_dtpeminjam'])) {
  $id_hapus_dtPeminjam = $_POST['id_hapus_dtpeminjam'];

  // sql to delete a record
  $sql_hapus_dtPeminjam = "DELETE FROM siswa WHERE id_siswa = '$id_hapus_dtPeminjam'";

  if ($conn->query($sql_hapus_dtPeminjam) === TRUE) {
      echo "Record deleted successfully";
      header('Location: data_peminjam_admin.php');
  } else {
      echo "Error deleting record: " . $conn->error;
  }
}

if (isset($_POST['btn_edit_dtpeminjam'])) {
  // Ambil data dari formulir
  $id_edit_dtPeminjam = isset($_POST['id_edit_dtPeminjam']) ? $_POST['id_edit_dtPeminjam'] : null;
  $data_usn_dtPeminjam = isset($_POST['username']) ? $_POST['username'] : null;
  $data_nama_dtPeminjam = isset($_POST['nm_peminjam']) ? $_POST['nm_peminjam'] : null;
  $data_email_dtPeminjam = isset($_POST['email']) ? $_POST['email'] : null;

  // Validasi data POST
  if (!$id_edit_dtPeminjam || !$data_usn_dtPeminjam|| !$data_nama_dtPeminjam || !$data_email_dtPeminjam) {
      echo "Ada data yang kurang dari formulir.";
      exit;
  }

  // Query update data barang dengan prepared statement
  $sql_update_dtPeminjam = "UPDATE siswa
                        SET username = ?, 
                            nama_siswa = ?, 
                            email_siswa = ? 
                        WHERE id_siswa = ?";

  // Persiapkan statement SQL
  $stmt = mysqli_prepare($conn, $sql_update_dtPeminjam);
  if ($stmt === false) {
      echo "Error preparing statement: " . mysqli_error($conn);
      exit;
  }

  // Bind parameter ke statement
  mysqli_stmt_bind_param($stmt, "sssi", $data_usn_dtPeminjam, $data_nama_dtPeminjam, $data_email_dtPeminjam, $id_edit_dtPeminjam);

  // Eksekusi statement
  if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_close($stmt);
      header('Location: data_peminjam_admin.php'); // Redirect ke halaman barang dengan status sukses
      exit();
  } else {
      echo "Error executing statement: " . mysqli_stmt_error($stmt); // Tampilkan pesan error jika execute gagal
  }
} else {
 
}


   

