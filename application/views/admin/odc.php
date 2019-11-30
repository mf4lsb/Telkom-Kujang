        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
            <?= form_error('datel_id', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('sto', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('odc', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        
            <!-- success -->
            <?= $this->session->flashdata('message');?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah ODC</a>
            <div class="table-responsive">
                <table class="table table-hover display" id="odc_table" style="font-size: 14px;">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">ODC</th>
                    <th scope="col">STO</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">House Hold</th>
                    <th scope="col">Total ODP</th>
                    <th scope="col">Total Port</th>
                    <th scope="col" class="bg-danger text-light">Terpakai</th>
                    <th scope="col" class="bg-success text-light">Sisa Port</th>
                    <th scope="col" class="bg-info text-light">Reserved</th>
                    <th scope="col">Tipe Area</th>
                    <th scope="col">Karakteristik</th>
                    <th scope="col">Tipe Rumah</th>
                    <th scope="col">Tingkat Huni</th>
                    <th scope="col">Daya Beli</th>
                    <th scope="col">Potensi</th>
                    <th scope="col">Okupansi</th>
                    <th scope="col">Koordinat</th>
                    <th scope="col">Img</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody style="font-size: 12px;">
                <?php $i = 1; ?>
                <?php foreach ($getData as $gd) : ?>
                    <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= strtoupper('ODC-' . $gd['kode_sto'] . '-' . $gd['kode_odc']); ?></td>
                    <td><?= $gd['nama_sto']; ?></td>
                    <td><?= $gd['alamat']; ?></td>
                    <td class="table_odc" data-row_id="<?= $gd['id_odc']?>" data-column_name="demands" contenteditable><?= $gd['demands']; ?></td>
                    <td class="table_odc" data-row_id="<?= $gd['id_odc']?>" data-column_name="total_odp" contenteditable><?= $gd['total_odp']; ?></td>
                    <td class="table_odc" data-row_id="<?= $gd['id_odc']?>" data-column_name="port" contenteditable><?= $gd['port']; ?></td>
                    <td class="bg-danger text-light table_odc" data-row_id="<?= $gd['id_odc']?>" data-column_name="used" contenteditable><?= $gd['used']; ?></td>
                    <td class="bg-success text-light table_odc" data-row_id="<?= $gd['id_odc']?>" data-column_name="available" contenteditable><?= $gd['available']; ?></td>
                    <td class="bg-info text-light table_odc" data-row_id="<?= $gd['id_odc']?>" data-column_name="rsv" contenteditable><?= $gd['rsv']; ?></td>
                    <td><?= $gd['area']; ?></td>
                    <td><?= $gd['karakter']; ?></td>
                    <td><?= $gd['tipe_rumah']; ?></td>
                    <td><?= $gd['huni']; ?></td>
                    <td><?= $gd['daya_beli']; ?></td>
                    <!-- potensi = demand-used -->
                    <td><?= $gd['demands'] - $gd['used']; ?></td> 
                    <!-- occ = used/port*100 -->
                    <?php if($gd['port'] != 0) : ?>
                    <td><?= round(($gd['used'] / $gd['port'] * 100), 2); ?>%</td>
                    <?php else: ?>
                    <td class="bg-danger text-light">**<b class="text-warning">Total Port</b> tidak dapat bernilai NOL (0)**</td>
                    <?php endif ?>
                    <td>
                        <a href="http://maps.google.com?q=<?= $gd['tikor']; ?>" target="_blank"><?= $gd['tikor']; ?></a>
                    </td>
                    <td>
                        <!-- <a href="#" class="pop" id="<?php //echo $gd['id_odc']; ?>"> -->
                            <img src="<?= base_url('assets/img/odc/') . $gd['img']; ?>" alt="" class="img-thumbnail">
                            <a href="#" class="badge badge-primary pop" data-row_id="<?= $gd['id_odc'];?>" data-toggle="modal" data-target="#imagemodal">View</a>
                        <!-- </a> -->
                    </td>
                    <td>
                        <a href="<?= base_url('asman/editodc/') . $gd['id_odc']; ?>" class="badge badge-success">Edit</a>
                        <?php if($user['role_id'] == 1) : ?>
                            <!-- <a href="" class="badge badge-danger">Delete</a> -->
                            <a href="" class="badge badge-danger delete_odc" data-row_id="<?= $gd['id_odc']; ?>" data-row_img="<?= $gd['img']; ?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
                        <?php endif ?>
                    </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
                <!-- <tfoot>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">ODC</th>
                    <th scope="col">STO</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">House Hold</th>
                    <th scope="col">Total ODP</th>
                    <th scope="col">Total Port</th>
                    <th scope="col" class="bg-danger text-light">Terpakai</th>
                    <th scope="col" class="bg-success text-light">Sisa Port</th>
                    <th scope="col" class="bg-info text-light">Reserved</th>
                    <th scope="col">Tipe Area</th>
                    <th scope="col">Karakteristik</th>
                    <th scope="col">Tipe Rumah</th>
                    <th scope="col">Tingkat Huni</th>
                    <th scope="col">Daya Beli</th>
                    <th scope="col">Potensi</th>
                    <th scope="col">Okupansi</th>
                    <th scope="col">Koordinat</th>
                    <th scope="col">Img</th>
                    <th scope="col">Action</th>
                    </tr>
                </tfoot> -->
                </table>
            </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal -->
    <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newMenuModalLabel">Tambah ODC</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?= form_open_multipart('asman/odc'); ?>
        <div class="modal-body">
            <div class="form-group">
                <select name="sto" id="sto" class="form-control">
                    <option value="">Pilih STO</option>
                    <?php foreach($sto as $s) : ?>
                    <option value="<?= $s->id; ?>"><?= $s->nama_sto; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
           <div class="form-group">
                <input type="text" class="form-control" id="odc" name="odc" placeholder="Kode ODC">
            </div> 
            <div class="form-group">
                <textarea placeholder="Alamat" class="form-control" id="alamat" name="alamat" rows="3"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="homepass" name="homepass" placeholder="House Hold">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="odp" name="odp" placeholder="Total ODP">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="port" name="port" placeholder="Total Port">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="used" name="used" placeholder="Terpakai">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="sisa" name="sisa" placeholder="Sisa Port">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="rsv" name="rsv" placeholder="Reserved">
            </div>
            <div class="form-group">
                <select name="area" id="area" class="form-control">
                    <option value="">Pilih Tipe Area</option>
                    <option value="Cluster">Cluster</option>
                    <option value="Scatter">Scatter</option>
                </select>
            </div>
            <div class="form-group">
                <textarea placeholder="Karakteristik" class="form-control" id="char" name="char" rows="3"></textarea>
            </div>
            <div class="form-group">
                <select name="rumah" id="rumah" class="form-control">
                    <option value="">Pilih Tipe Rumah</option>
                    <option value="Mewah">Mewah</option>
                    <option value="Menengah-Atas">Menengah-Atas</option>
                    <option value="Menengah">Menengah</option>
                    <option value="Sederhana">Sederhana</option>
                </select>
            </div>
            <div class="form-group">
                <select name="huni" id="huni" class="form-control">
                    <option value="">Pilih Tingkat Huni</option>
                    <option value="Tinggi">Tinggi</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Rendah">Rendah</option>
                </select>
            </div>
            <div class="form-group">
                <select name="beli" id="beli" class="form-control">
                    <option value="">Pilih Daya Beli</option>
                    <option value="Tinggi">Tinggi</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Rendah">Rendah</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="tikor" name="tikor" placeholder="Titik Koordinat">
            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">ODC Image</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
        </form>
        </div>
    </div>
    </div>

    <!-- MODAL PICTURE -->
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" data-dismiss="modal">
            <div class="modal-content">              
                <div class="modal-body" id="picture_detail">
      	            <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <img src="<?php// echo base_url('assets/img/odc/') . $gd['img']; ?>" class="imagepreview" style="width: 100%;"> -->
                </div>
            </div>
        </div>
    </div>