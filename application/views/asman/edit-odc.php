<?php $area = ["Cluster", "Scatter"]; ?>
<?php $rumah = ["Mewah", "Menengah-Atas", "Menengah", "Sederhana"]; ?>
<?php $hb = ["Tinggi", "Sedang", "Rendah"]; ?>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <?= $this->session->flashdata('message');?>

          <?= form_error('odc', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          
          <div class="row">
            <div class="col-lg-8">
                <?= form_open_multipart('asman/editodc/' . $getODC['id_odc']); ?>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Kode ODC</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="odc" placeholder="Kode ODC" name="odc" value="<?= $getODC['kode_odc'];?>">
                        <?= form_error('odc', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">STO</label>
                        <div class="col-sm-9">
                        <select name="sto" id="sto" class="form-control">
                            <option value="<?= $getODC['sto_id'];?>"><?= $getODC['nama_sto'];?></option>
                            <?php foreach($sto as $s) : ?>
                            <?php if($s->nama_sto != $getODC['nama_sto']) : ?>
                                <option value="<?= $s->id; ?>"><?= $s->nama_sto; ?></option>
                            <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <textarea placeholder="Alamat" class="form-control" id="alamat" name="alamat" rows="3"><?= $getODC['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">House Hold</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="House Hold" value="<?= $getODC['demands'];?>" id="homepass" name="homepass">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Total ODP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Total ODP" value="<?= $getODC['total_odp'];?>" id="odp" name="odp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Total Port</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Total Port" value="<?= $getODC['port'];?>" id="port" name="port">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Terpakai</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Terpakai" value="<?= $getODC['used'];?>" id="used" name="used">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Sisa Port</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Sisa Port" value="<?= $getODC['available'];?>" id="sisa" name="sisa">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Reserved</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Reserved" value="<?= $getODC['rsv'];?>" id="rsv" name="rsv">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Tipe Area</label>
                        <div class="col-sm-9">
                            <select name="area" id="area" class="form-control">
                                <option value="<?= $getODC['area'];?>"><?= $getODC['area']; ?></option>
                                <?php foreach($area as $a) : ?>
                                <?php if($a != $getODC['area']) : ?>
                                <option value="<?= $a; ?>"><?= $a;?></option>
                                <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Karakteristik</label>
                        <div class="col-sm-9">
                            <textarea placeholder="Karakteristik" class="form-control" id="char" name="char" rows="3"><?= $getODC['karakter']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Tipe Rumah</label>
                        <div class="col-sm-9">
                        <select name="rumah" id="rumah" class="form-control">
                            <?php if($getODC['tipe_rumah'] != '') : ?>
                            <option value="<?= $getODC['tipe_rumah']; ?>"><?= $getODC['tipe_rumah']; ?></option>
                            <?php else : ?>
                            <option value="">Pilih Tipe Rumah</option>
                            <?php endif ?>
                            <?php foreach($rumah as $r) : ?>
                            <?php if($r != $getODC['tipe_rumah']) : ?>
                            <option value="<?= $r; ?>"><?= $r;?></option>
                            <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Tingkat Huni</label>
                        <div class="col-sm-9">
                        <select name="huni" id="huni" class="form-control">
                            <?php if($getODC['huni'] != '') : ?>
                            <option value="<?= $getODC['huni']; ?>"><?= $getODC['huni']; ?></option>
                            <?php else : ?>
                            <option value="">Pilih Tingkat Huni</option>
                            <?php endif ?>
                            <?php foreach($hb as $huni) : ?>
                            <?php if($huni != $getODC['huni']) : ?>
                            <option value="<?= $huni; ?>"><?= $huni;?></option>
                            <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Daya Beli</label>
                        <div class="col-sm-9">
                        <select name="beli" id="beli" class="form-control">
                            <?php if($getODC['daya_beli'] != '') : ?>
                            <option value="<?= $getODC['daya_beli']; ?>"><?= $getODC['daya_beli']; ?></option>
                            <?php else : ?>
                            <option value="">Pilih Daya Beli</option>
                            <?php endif ?>
                            <?php foreach($hb as $beli) : ?>
                            <?php if($beli != $getODC['daya_beli']) : ?>
                            <option value="<?= $beli; ?>"><?= $beli;?></option>
                            <?php endif ?>
                            <?php endforeach ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Titik Koordinat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tikor" name="tikor" placeholder="Titik Koordinat" value="<?= $getODC['tikor']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">Gambar ODC</div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/odc/') . $getODC['img']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
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