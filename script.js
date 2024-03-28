function deleteVitamin(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data vitamin?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/vitaminController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Vitamin Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Vitamin Gagal Dihapus!",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deletePMT(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data PMT?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/pmtController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data PMT Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data PMT Gagal Dihapus!",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deletePenimbangan(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data penimbangan?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/penimbanganController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Penimbangan Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Penimbangan Gagal Dihapus!",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deletePengguna(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data pengguna?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/userController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Pengguna Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Pengguna Gagal Dihapus!",
              text: "Pengguna memiliki data yang lain, seperti balita, atau kader. Silahkan hapus data tersebut yang memiliki keterkaitan dengan data pengguna ini",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deleteImunisasi(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data imunisasi?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/imunisasiController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Imunisasi Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Imunisasi Gagal Dihapus!",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deletePosyandu(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data posyandu?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/posyanduController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          // Menampilkan pesan sukses jika data berhasil dihapus
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Posyandu Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Posyandu Gagal Dihapus!",
              text: "Posyandu memiliki data yang lain, seperti balita, jadwal posyandu, atau kader. Silahkan hapus data tersebut yang memiliki keterkaitan dengan data posyandu ini",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deleteKader(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data kader?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/kaderController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Kader Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Kader Gagal Dihapus!",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deleteJadwal(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data jadwal?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/jadwalController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Jadwal Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Jadwal Gagal Dihapus!",
              text: "Jadwal memiliki data yang lain, seperti vitamin, penimbangan, PMT, atau imunisasi. Silahkan hapus data tersebut yang memiliki keterkaitan dengan data jadwal ini",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}

function deleteBalita(id) {
  // Menampilkan Sweet Alert dengan tombol Yes dan No
  Swal.fire({
    title: "Konfirmasi",
    text: "Apakah Anda yakin ingin menghapus data balita?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes",
    cancelButtonText: "No",
    focusCancel: true,
  }).then((result) => {
    if (result.isConfirmed) {
      // Memanggil fungsi PHP menggunakan AJAX saat tombol Yes diklik
      $.ajax({
        url: "../controller/balitaController.php",
        type: "POST",
        data: {
          action: "delete",
          id: id,
        },
        success: function (response) {
          // Menampilkan pesan sukses jika data berhasil dihapus
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Data Balita Berhasil Dihapus!",
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                document.location.href = "index.php";
              }
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "Data Balita Gagal Dihapus!",
              text: "Balita memiliki data yang lain, seperti vitamin, penimbangan, atau imunisasi. Silahkan hapus data tersebut yang memiliki keterkaitan dengan data balita ini",
            });
          }
        },
        error: function (xhr, status, error) {
          // Menampilkan pesan error jika terjadi kesalahan dalam penghapusan data
          Swal.fire({
            title: "Error",
            text: "Terjadi kesalahan dalam menghapus data: " + error,
            icon: "error",
          });
        },
      });
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      // Menampilkan pesan jika tombol No diklik
      Swal.fire("Batal", "Penghapusan data dibatalkan", "info");
    }
  });
}
