<!doctype html>
<?php
session_start();
if ($_SESSION['role'] != "Petugas") {
  header("location:../index.php?pesan=petugas");
}
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../Asset/css/base.css">
  <link rel="stylesheet" href="../Asset/css/mobile.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" type="text/css" href="../Asset/SweetAlert/sweetalert2.min.css">
  <link rel="stylesheet" href="../Asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <title>Kepegawaian</title>
</head>

<body style="background:#f9f9f9;">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Kepegawaian</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <div> Hi! <?php echo $_SESSION['nama'] ?> </div>
        <div class="logout"><a href="../auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></div>
      </form>
    </div>
  </nav>
  <header>
    <div class="row">
      <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <div class="profile-user">
            <div class="image-user">
              <i class="fas fa-user"></i>
            </div>
            <p> <?php echo $_SESSION['nama'] ?></p>
          </div>
          <a class="nav-link sidebar active" href="perkuliahan.php" role="tab" aria-selected="false" id="link-perkuliahan"><i class="fas fa-university"></i> Gaji</a>
        </div>
      </div>
      <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent"> 
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div class="container">
              <section class="data-table">
                <div class="container">
                  <div class="row">
                    <div class="col-4">
                      <h3 class="title-table"> Daftar Perkuliahan </h3>
                    </div>
                    <div class="col-5"></div>
                    <div class="col-1 list-button">
                      <button class="btn btn-primary btn-sm" style=" float: right;" onclick="ToPDF()"><i class="fa fa-file-pdf"></i> PDF</button>
                      <div id="Tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tambah Data Perkuliahan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <!-- TAMBAH -->
                            <div class="modal-body">
                              <input id="petugas" type="hidden" value='<?= $_SESSION['id_user'] ?>'>
                              <div class="form-group">
                                <label for="id">Mahasiswa</label>
                                <select id="id" name="id" class="form-control" required>
                                  <option>Pilih Mahasiswa</option>
                                  <?php
                                  include '../auth/koneksi.php';
                                  $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                                  $i = 1;
                                  while ($row = mysqli_fetch_array($query)) {
                                    echo "<option class='id'" . $i . " value=" . $row['NIM'] . ">" . $row['NIM'] . " - " . $row['NamaMahasiswa'] . "</option>";
                                    $i++;
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="idnd">Mata Kuliah</label>
                                <select id="idnd" name="idnd" class="form-control" required>
                                  <option>Pilih Mata Kuliah</option>
                                  <?php
                                  include '../auth/koneksi.php';
                                  $query = mysqli_query($koneksi, "SELECT * FROM matakuliah");
                                  $i = 1;
                                  while ($row = mysqli_fetch_array($query)) {
                                    echo "<option class='id'" . $i . " value=" . $row['KodeMK'] . ">" . $row['KodeMK'] . " - " . $row['NamaMK'] . "</option>";
                                    $i++;
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nip">Dosen</label>
                                <select id="nip" name="nip" class="form-control" required>
                                  <option>Pilih Dosen</option>
                                  <?php
                                  include '../auth/koneksi.php';
                                  $query = mysqli_query($koneksi, "SELECT * FROM dosen");
                                  $i = 1;
                                  while ($row = mysqli_fetch_array($query)) {
                                    echo "<option class='id'" . $i . " value=" . $row['NIP'] . ">" . $row['NIP'] . " - " . $row['NamaDosen'] . "</option>";
                                    $i++;
                                  }
                                  ?>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="nilai">Index Nilai</label>
                                <input type="text" class="form-control" id="nilai" maxlength="1" aria-describedby="sks" required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary btn_simpan">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TAMPIL -->
                  <table class="table" id="tabel-data">
                    <thead class="" style="background:#007BFF;color:#fff;">
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col" hidden>Id</th>
                        <th scope="col">Nama Karyawan</th>
                        <th scope="col" hidden>Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col" hidden>id gaji</th>
                        <th scope="col">Jumlah Gaji</th>
                        <th scope="col">
                          <center> </center>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include '../auth/koneksi.php';
                      $perkuliahan = mysqli_query($koneksi, "SELECT mahasiswa.NamaMahasiswa, dosen.NamaDosen, matakuliah.NamaMK, matakuliah.SKS, perkuliahan.NIM, perkuliahan.NIP, perkuliahan.KodeMK, perkuliahan.Nilai, user.nama
                      FROM perkuliahan 
                      INNER JOIN mahasiswa ON perkuliahan.NIM = mahasiswa.NIM
                      INNER JOIN dosen ON perkuliahan.NIP = dosen.NIP
                      INNER JOIN matakuliah ON perkuliahan.KodeMK = matakuliah.KodeMK
                      INNER JOIN user ON perkuliahan.id_user = user.id_user");
                      $i = 1;
                      while ($row = mysqli_fetch_array($perkuliahan)) {
                        echo "<tr class='item" . $row['NIM'] . "" . $row['KodeMK'] . "'>
                          <td>" . $i . "</td>
                          <td hidden>" . $row['NIM'] . "</td>
                          <td>" . $row['NamaMahasiswa'] . "</td>
                          <td hidden>" . $row['NIP'] . "</td>
                          <td>" . $row['NamaDosen'] . "</td>
                          <td hidden>" . $row['KodeMK'] . "</td>
                          <td>" . $row['NamaMK'] . "</td>
                          <td>" . $row['SKS'] . "</td>
                          <td>" . $row['Nilai'] . "</td>
                          <td>" . $row['nama'] . "</td>
                          <td>
                            <center>
                                <button class='btn btn-primary btn_edit'data-toggle='modal' data-id=" . $row['NIM'] . " data-idnd=" . $row['KodeMK'] . " data-target='#edit'aria-hidden='true' type='button'><i class='fas fa-pen'></i> </button>
                                <button class='btn btn-primary btn_delete' style='background:red;border:none;' data-id=" . $row['NIM'] . " data-idnd=" . $row['KodeMK'] . "> <i class='fas fa-trash'></i> </button>
                            </center>
                          </td>
                        </tr>";
                        $i++;
                      }
                      ?>
                    </tbody>
                  </table>
                  <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Data Perkuliahan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <!-- EDIT -->
                        <div class="modal-body">
                          <input id="edit-petugas" type="hidden" value='<?= $_SESSION['id_user'] ?>'>
                          <div class="form-group">
                            <label for="edit-id">Mahasiswa</label>
                            <select id="edit-id" name="edit-id" class="form-control" required>
                              <option>Pilih Mahasiswa</option>
                              <?php
                              include '../auth/koneksi.php';
                              $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
                              $i = 1;
                              while ($row = mysqli_fetch_array($query)) {
                                echo "<option class='id'" . $i . " value=" . $row['NIM'] . ">" . $row['NIM'] . " - " . $row['NamaMahasiswa'] . "</option>";
                                $i++;
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="edit-idnd">Mata Kuliah</label>
                            <select id="edit-idnd" name="edit-idnd" class="form-control" required>
                              <option>Pilih Mata Kuliah</option>
                              <?php
                              include '../auth/koneksi.php';
                              $query = mysqli_query($koneksi, "SELECT * FROM matakuliah");
                              $i = 1;
                              while ($row = mysqli_fetch_array($query)) {
                                echo "<option class='id'" . $i . " value=" . $row['KodeMK'] . ">" . $row['KodeMK'] . " - " . $row['NamaMK'] . "</option>";
                                $i++;
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="edit-nip">Dosen</label>
                            <select id="edit-nip" name="edit-nip" class="form-control" required>
                              <option>Pilih Dosen</option>
                              <?php
                              include '../auth/koneksi.php';
                              $query = mysqli_query($koneksi, "SELECT * FROM dosen");
                              $i = 1;
                              while ($row = mysqli_fetch_array($query)) {
                                echo "<option class='id'" . $i . " value=" . $row['NIP'] . ">" . $row['NIP'] . " - " . $row['NamaDosen'] . "</option>";
                                $i++;
                              }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="edit-nilai">Index Nilai</label>
                            <input type="text" class="form-control" id="edit-nilai" maxlength="1" aria-describedby="sks" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary btn_update">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </header>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="../Asset/SweetAlert/sweetalert2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="../Asset/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script type="text/javascript" src="../Asset/js/jspdf.plugin.autotable.min.js"></script>
  <script>
    $(document).ready(() => {
      const idLama = null;
      const idndLama = null;
      $('#tabel-data').DataTable({
        "pageLength": 44
      })
    });

    // SAVE PDF
    function ToPDF() {
      var doc = new jsPDF('p', 'pt', 'a4'),
        margins = {
          top: 40,
          bottom: 60,
          left: 40,
          width: 522
        };
      doc.setFontSize(26);
      doc.text(40, 35, 'Laporan Data Perkuliahan');


      doc.autoTable({
        html: '#tabel-data',
        margin: {
          top: 60,
          right: 40,
          bottom: 40,
          left: 40
        }
      });
      doc.save('SBD-Akademik-Perkuliahan.pdf');
    }

    // DELETE
    function deleteAction(id, idnd) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: "../controller/perkuliahan-controller.php",
            type: 'post',
            data: {
              id,
              idnd,
              tipe: 'delete'
            },
            success: function(data) {
              swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              );
              $('.item' + id + idnd).fadeOut(1500, function() {
                $(this).remove();
              });
            },
            error: function(data) {
              swalWithBootstrapButtons.fire(
                'Gagal!',
                'Failed to delete your file.',
                'error'
              );
            }
          });
        } else if (
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      });
    }

    // DELETE BUTTON
    $('.btn_delete').on('click', function() {
      idLama = $(this).data('id');
      idndLama = $(this).data('idnd');
      deleteAction(idLama, idndLama);
    });

    // CREATE
    $('.btn_simpan').on('click', function() {
      let id = $('#id').val();
      let idnd = $('#idnd').val();
      let nip = $('#nip').val();
      let nilai = $('#nilai').val();
      let petugas = $('#petugas').val();
      if (id == '' || idnd == '' || nip == '' || nilai == '' || petugas == '') {
        Swal.fire(
          'Warning!',
          'Pastikan Semua Data sudah terisi',
          'warning'
        );
      } else {
        $.ajax({
          url: "../controller/perkuliahan-controller.php",
          type: 'post',
          data: {
            tipe: 'create',
            id,
            idnd,
            nip,
            nilai,
            petugas
          },
          success: function(data) {
            Swal.fire({
              icon: 'success',
              title: 'Your work has been saved',
              showConfirmButton: false,
              timer: 1500
            })
            setTimeout(function() {
              window.location.reload(1);
            }, 1600);
          },
          error: function(data) {
            swalWithBootstrapButtons.fire(
              'Gagal!',
              'Failed to add data',
              'error'
            );
          }
        });
      }
    });

    // EDIT BUTTON
    $('.btn_edit').on('click', function() {
      idLama = $(this).data('id');
      idndLama = $(this).data('idnd');
      editAction(idLama, idndLama);
    });

    // UPDATE
    $('.btn_update').on('click', function() {
      $.ajax({
        url: "../controller/perkuliahan-controller.php",
        type: 'post',
        data: {
          tipe: 'update',
          idLama,
          idndLama,
          id: $('#edit-id').val(),
          idnd: $('#edit-idnd').val(),
          nip: $('#edit-nip').val(),
          nilai: $('#edit-nilai').val(),
          petugas: $('#edit-petugas').val()
        },
        success: function(data) {
          Swal.fire({
            icon: 'success',
            title: 'Update Success !',
            showConfirmButton: false,
            timer: 1500
          })
          setTimeout(function() {
            window.location.reload(1);
          }, 1600);
        },
        error: function(data) {
          swalWithBootstrapButtons.fire(
            'Gagal!',
            'Failed to delete your file.',
            'error'
          );
        }
      });
    });

    // EDIT
    function editAction(id, idnd) {
      $.ajax({
        url: "../controller/perkuliahan-controller.php",
        type: 'post',
        data: {
          id,
          idnd,
          tipe: 'edit'
        },
        success: function(data) {
          let edit = $.parseJSON(data);
          $('#edit-id').val(edit[0]['id']);
          $('#edit-idnd').val(edit[0]['idnd']);
          $('#edit-nip').val(edit[0]['nip']);
          $('#edit-nilai').val(edit[0]['nilai']);
        },
        error: function(data) {
          swalWithBootstrapButtons.fire(
            'Gagal!',
            'Failed to delete your file.',
            'error'
          );
        }
      });
    }
  </script>
</body>

</html>