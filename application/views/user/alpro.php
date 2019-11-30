        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="row">
            <div class="col-lg">
            <?= form_error('odp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('sto', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('odc', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('port', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('used', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        
            <!-- success -->
            <?= $this->session->flashdata('message');?>
            <?php if($user['role_id'] != 6) : ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Alpro</a>
            <?php endif ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="alpro_table" style="font-size: 14px">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">STO</th>
                        <th scope="col">Name</th>
                        <th scope="col">Cluster</th>
                        <th scope="col">Address</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">ODC</th>
                        <th scope="col">Port</th>
                        <th scope="col" class="bg-danger text-light">Used</th>
                        <th scope="col" class="bg-success text-light">RFS</th>
                        <th scope="col">Go Live</th>
                        <th scope="col">Modul</th>
                        <th scope="col">ODP</th>
                        <th scope="col">House Hold</th>
                        <th scope="col">HH Type</th>
                        <th scope="col">Purchasing Power</th>
                        <th scope="col">Characteristic</th>
                        <th scope="col">Competitor</th>
                        <th scope="col">Coordinate</th>
                        <th scope="col">Occupance</th>
                        <?php if($user['role_id'] != 6) : ?>
                        <th scope="col">Action</th>
                        <?php endif ?>
                        </tr>
                    </thead>
                    <tbody style="font-size: 12px;">
                    <?php $i = 1; ?>
                    <?php foreach ($getAllData as $gda) : ?>
                        <tr>
                        <th scope="row"><?= $i; ?></th>
                        <?php 
                        //if($getDatel['datel_id'] == $getDatel['id'])
                        ?>
                        <td><?= $gda['nama_sto']; ?></td>
                        <td><?= $gda['nama']; ?></td>
                        <td><?= $gda['cluster']; ?></td>
                        <td><?= $gda['alamat_odp']; ?></td>
                        <td><?= $gda['kelurahan']; ?></td>
                        <td><?= $gda['kode_odc']; ?></td>
                        <td><?= $gda['port_odp']; ?></td>
                        <?php if($user['role_id'] != 6) : ?>
                        <td class="bg-danger text-light table_alpro" data-row_id="<?= $gda['id_alpro']?>" data-column_name="used_odp" contenteditable><?= $gda['used_odp']; ?></td>
                        <?php else : ?>
                        <td class="bg-danger text-light"><?= $gda['used_odp']; ?></td>
                        <?php endif ?>

                        <td class="bg-success text-light"><?= $gda['port_odp'] - $gda['used_odp']; ?></td> 
                        <td><?= date('d F Y', strtotime($gda['date_live']));?></td>
                        <td><?= $gda['modul']; ?></td>
                        <td><?= strtoupper('ODP-' . $gda['kode_sto'] . '-' . $gda['kode_odc'] . '/' . $gda['nama_odp']); ?></td>
                        <td><?= $gda['demands']; ?></td>
                        <td><?= $gda['type']; ?></td>
                        <td><?= $gda['power']; ?></td>
                        <td><?= $gda['karakter_odp']; ?></td>
                        <td>
                            <?php foreach($competitor as $komp) :?>
                                <?php foreach(explode(',', $gda['competitor_id']) as $comp) :?>
                                <?php if($komp['id'] == htmlspecialchars($comp)) :?>
                                <?= $komp['competitor'] . ','; ?>
                                <?php endif ?>
                                <?php endforeach ?>
                            <?php endforeach ?>
                        </td>
                        <td>
                            <a href="http://maps.google.com?q=<?= $gda['tikor']; ?>" rel="noopener noreferrer" target="_blank"><?= $gda['tikor']; ?></a>
                        </td>
                        <!-- occ = used/port*100 -->
                        <?php if($gda['port_odp'] != 0) : ?>
                        <td>
                            <?= round(($gda['used_odp'] / $gda['port_odp'] * 100), 2); ?>%
                        </td>
                        <?php else : ?>
                        <td class="bg-danger text-light">**<b class="text-warning">Port ODP</b> tidak dapat bernilai NOL (0)**</td>
                        <?php endif?>
                        <?php if($user['role_id'] != 6) : ?>
                        <td>
                            <a href="<?= base_url('user/editalpro/') . $gda['id_alpro']; ?>" class="badge badge-success">Edit</a>
                            <a href="" class="badge badge-danger delete_alpro" data-row_id="<?= $gda['id_alpro']?>" data-toggle="modal" data-target="#deleteModal">Delete</a>
                        </td>
                        <?php endif ?>
                        </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">STO</th>
                        <th scope="col">Name</th>
                        <th scope="col">Cluster</th>
                        <th scope="col">Address</th>
                        <th scope="col">Kelurahan</th>
                        <th scope="col">ODC</th>
                        <th scope="col">Port</th>
                        <th scope="col" class="bg-danger text-light table_alpro">Used</th>
                        <th scope="col" class="bg-success text-light">RFS</th>
                        <th scope="col">Go Live</th>
                        <th scope="col">Modul</th>
                        <th scope="col">ODP</th>
                        <th scope="col">House Hold</th>
                        <th scope="col">HH Type</th>
                        <th scope="col">Purchasing Power</th>
                        <th scope="col">Characteristic</th>
                        <th scope="col">Competitor</th>
                        <th scope="col">Coordinate</th>
                        <th scope="col">Occupance</th>
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
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Alpro</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('user/alpro'); ?>" method="post"> 
        <div class="modal-body">
            <div class="form-group">
                <select name="sto" id="sto" class="form-control">
                    <option value="">Choose STO</option>
                    <?php foreach($sto as $s) : ?>
                    <option value="<?= $s->id; ?>"><?= $s->nama_sto; ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="cluster" name="cluster" placeholder="Cluster">
            </div>
            <div class="form-group">
                <textarea placeholder="Address" class="form-control" id="alamat" name="alamat" rows="5"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan">
            </div>
            <div class="form-group">
                <select name="odc" id="odc" class="form-control">
                    <option value="">Choose ODC</option>
                </select>
            </div>
            <div class="form-group">
                <select name="port" id="port" class="form-control">
                    <option value="">Choose ODP Port</option>
                    <option value="8">8</option>
                    <option value="16">16</option>
                </select>
            </div>
            <div id="radio"></div>
            <div class="form-group">
                <input type="text" class="form-control" id="date" name="date" placeholder="Go-Live">
            </div>
            <div class="form-group">
                <select name="modul" id="modul" class="form-control">
                    <option value="">Choose OLT Modul</option>
                    <option value="Fiber Home">Fiber Home</option>
                    <option value="Huawei">Huawei</option>
                    <option value="ZTE">ZTE</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="odp" name="odp" placeholder="Kode Inisial ODP">
            </div>
            <div class="form-group">
                <select name="type" id="type" class="form-control">
                    <option value="">Choose Type House Hold</option>
                    <option value="Mewah">Mewah</option>
                    <option value="Menengah-Atas">Menengah-Atas</option>
                    <option value="Menengah">Menengah</option>
                    <option value="Sederhana">Sederhana</option>
                </select>
            </div>
            <div class="form-group">
                <select name="power" id="power" class="form-control">
                    <option value="">Choose Purchasing Power</option>
                    <option value="Tinggi">Tinggi</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Rendah">Rendah</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="char" name="char" placeholder="Characteristic">
            </div>
            <div class="form-group">
                <label for="port" class="col-sm-12 pl-1">Competitor</label>
                    <?php foreach($competitor as $comp) : ?>
                    <div class="form-check form-check-inline col-sm-3 pl-2">
                        <input class="form-check-input" type="checkbox" id="competitor" name="competitor[]" value="<?= $comp['id'];?>">
                        <label class="form-check-label" for="inlineCheckbox1" style="font-size: 15px;"><?= $comp['competitor'];?></label>
                    </div>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="tikor" name="tikor" placeholder="Titik Koordinat">
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