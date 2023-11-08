<?php 
    ob_start();
    require "../function/session.php";
    require "../function/koneksi.php";

  $query= " SELECT * FROM kategoriproduk ORDER BY id_kategori ASC ";
  $sql= mysqli_query($con,$query);
  $no = 0;
?>

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Fitur /</span> Kategori</h4>

              <div class="card">
              
              <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-header fw-bold">Kategori</h5>
                <form method="POST" action="tambahkategori.php" >
                  <table>
                    <tr>
                      <td style="width:15pc;"><input type="text" class="form-control" required id="kategoritambah" name="kategoritambah" placeholder="Kategori Barang Baru"></td>
                      <td style="padding-left:10px;"><button id="tombolsimpankategori" name="tombolsimpankategori" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</button></td>
                    </tr>
                  </table>
                </form>
              </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <caption class="ms-4">
                      List of Projects
                    </caption>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sql as $datakategori): ?>
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo ++$no?></strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $datakategori["nama_kategori"]?></strong></td>
                        <td><span class="badge bg-label-success me-1"><?php echo $datakategori["tanggal_kategori"]?></span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);"
                                ><i class="bx bx-edit-alt me-1"></i> Edit</a
                              >
                              <a class="dropdown-item" href="delete.php?id=<?php echo $datakategori['id_kategori']; ?>"
                                ><i class="bx bx-trash me-1"></i> Delete</a
                              >
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>



<?php 
    $content = ob_get_clean();
    include "../admin/body.php";
?>