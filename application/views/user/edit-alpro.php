<?php $port = ["8", "16"]; ?>
<?php $rumah = ["Mewah", "Menengah-Atas", "Menengah", "Sederhana"]; ?>
<?php $hb = ["Tinggi", "Sedang", "Rendah"]; ?>
<?php $modul = ["Fiber Home", "ZTE", "Huawei"]; ?>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= $this->session->flashdata('message');?>
          <?= $this->session->flashdata('pesan');?>
          <?= form_error('used', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= form_error('sto', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= form_error('odc', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= form_error('odp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

          <div class="row">
            <div class="col-lg-8">
                <?= form_open_multipart('user/editalpro/' . $getDataAlpro['id_alpro']); ?>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">STO</label>
                        <div class="col-sm-9">
                        <select name="sto" id="sto" class="form-control">
                            <!-- <option value="<?php //echo $getDataAlpro['sto_id'];?>"><?php //echo $getDataAlpro['nama_sto'];?></option> -->
                            <option value="">Pilih STO</option>
                            <?php foreach($sto as $s) : ?>
                                <?php// if($s->nama_sto != $getDataAlpro['nama_sto']) : ?>
                                    <option value="<?= $s->id; ?>"><?= $s->nama_sto; ?></option>
                                <?php //endif ?>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('sto', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Name" value="<?= $getDataAlpro['nama'];?>" id="jenis" name="jenis">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Cluster</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Cluster" value="<?= $getDataAlpro['cluster'];?>" id="cluster" name="cluster">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <textarea placeholder="Address" class="form-control" id="alamat" name="alamat" rows="3"><?= $getDataAlpro['alamat_odp']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Kelurahan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Kelurahan" value="<?= $getDataAlpro['kelurahan'];?>" id="kelurahan" name="kelurahan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">ODC</label>
                        <div class="col-sm-9">
                        <select name="odc" id="odc" class="form-control">
                            <!-- <option value="<?php //echo $getDataAlpro['odc_id'];?>"><?php //echo $getDataAlpro['kode_odc'];?></option> -->
                            <option value="">Pilih ODC</option>
                        </select>
                        <?= form_error('odc', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Kode ODP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Kode ODP" value="<?= $getDataAlpro['nama_odp'];?>" id="odp" name="odp">
                            <?= form_error('odp', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Port ODP</label>
                        <div class="col-sm-9">
                            <select name="port_edit" id="port_edit" class="form-control">
                                <option value="<?= $getDataAlpro['port_odp'];?>"><?= $getDataAlpro['port_odp']; ?></option>
                                <?php foreach($port as $p) : ?>
                                <?php if($p != $getDataAlpro['port_odp']) : ?>
                                <option value="<?= $p; ?>"><?= $p;?></option>
                                <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Port Used</label>
                        <div class="col-sm-9 pt-2">
                            <?php
                                for($i = 1; $i <= 16; $i++)
                                {
                                    if($i == 1 || $i == 5 || $i == 9 || $i == 13) :?>
                                        <div class="row form-group pl-0 col-sm-12">
                                    <?php endif ?>
                                    <div class="form-check form-check-inline col pl-3">
                                        <?php if($i == $getDataAlpro['used_odp']) : ?>
                                            <input class="form-check-input" type="radio" name="used" id="used" value="<?= $i?>" checked>
                                            <label class="form-check-label" for="inlineRadio1"><?= $i;?></label>
                                        <?php else : ?>
                                            <input class="form-check-input" type="radio" name="used" id="used" value="<?= $i?>">
                                            <label class="form-check-label" for="inlineRadio1"><?= $i;?></label>
                                        <?php endif ?>
                                    </div>
                                    <?php if($i == 4 || $i == 8 || $i == 12 || $i == 16) :?>
                                        </div>
                                    <?php endif ?>
                               <?php }
                            ?>
                            <?= form_error('used', '<small class="text-danger pl-1">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Go Live</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="date" name="date" placeholder="Go Live" value="<?= date('d-F-Y', strtotime($getDataAlpro['date_live']));?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Modul</label>
                        <div class="col-sm-9">
                            <select name="modul" id="modul" class="form-control">
                                <option value="<?= $getDataAlpro['modul'];?>"><?= $getDataAlpro['modul']; ?></option>
                                <?php foreach($modul as $m) : ?>
                                <?php if($m != $getDataAlpro['modul']) : ?>
                                <option value="<?= $m; ?>"><?= $m;?></option>
                                <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">HH Type</label>
                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-control">
                                <option value="<?= $getDataAlpro['type'];?>"><?= $getDataAlpro['type']; ?></option>
                                <?php foreach($rumah as $r) : ?>
                                <?php if($r != $getDataAlpro['type']) : ?>
                                <option value="<?= $r; ?>"><?= $r;?></option>
                                <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Purchasing Power</label>
                        <div class="col-sm-9">
                            <select name="power" id="power" class="form-control">
                                <option value="<?= $getDataAlpro['power'];?>"><?= $getDataAlpro['power']; ?></option>
                                <?php foreach($hb as $power) : ?>
                                <?php if($power != $getDataAlpro['power']) : ?>
                                <option value="<?= $power; ?>"><?= $power;?></option>
                                <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Characteristic</label>
                        <div class="col-sm-9">
                            <textarea placeholder="Characteristic" class="form-control" id="char" name="char" rows="3"><?= $getDataAlpro['karakter_odp']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Competitor</label>
                        <div class="col-sm-9">
                            <?php foreach($competitor as $comp) : ?>
                            <?php $status = 0; ?>
                                <div class="form-check form-check-inline col-sm-3 pl-1">
                                <?php foreach(explode(',', $getDataAlpro['competitor_id']) as $komp) :?>
                                    <?php if($comp['id'] == htmlspecialchars($komp)) :?>
                                        <input class="form-check-input" type="checkbox" id="competitor" name="competitor[]" value="<?= $comp['id'];?>" checked>
                                        <label class="form-check-label" for="inlineCheckbox1" style="font-size: 15px;"><?= $comp['competitor'];?></label>
                                        <?php $status = 1; ?>
                                    <?php endif ?>
                                <?php endforeach ?>
                                <?php if($status != 1) :?>
                                    <input class="form-check-input" type="checkbox" id="competitor" name="competitor[]" value="<?= $comp['id'];?>">
                                    <label class="form-check-label" for="inlineCheckbox1" style="font-size: 15px;"><?= $comp['competitor'];?></label>
                                <?php endif ?>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!-- Competitor -->
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Coordinate</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tikor" name="tikor" placeholder="Coordinate" value="<?= $getDataAlpro['tikor']; ?>">
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>

                </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->