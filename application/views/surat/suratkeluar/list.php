<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
if(pagemax($listsurat[0]->jmldata)==0)
    $maxpage = 1;
else
    $maxpage = pagemax($listsurat[0]->jmldata);
?>

              
<div class="row-fluid">
    <form id="formlist" class="form-horizontal" method="post" action="<?php echo base_url(); ?>surat/suratkeluar">
    <div class="control-group">
        <label class="control-label" for="tglagenda">Kata Kunci</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input value="<?php echo $cari; ?>" id="cari" name="cari" type="text" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="jenissk">Jenis Surat Keluar</label>
        <div class="controls">
            <select id="jenissk" name="jenissk" data-placeholder="Pilih Jenis Surat Keluar...">
                <option value=""></option>
                <?php
                    foreach ($listjenis as $d) {
                        echo '<option value="'.$d->kd_jenis_sd.'-'.$d->kd_jenis_sk.'"';
                        if($d->kd_jenis_sd.'-'.$d->kd_jenis_sk == $jenissk)
                            echo ' selected';
                        echo '>'.$d->uraian_jenis_sk.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tglagenda">Tanggal Surat</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input value="<?php echo $tgl1; ?>" class="date-picker" id="tgl1" name="tgl1" type="text" data-date-format="dd-mm-yyyy" />
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>
                <span class="add-on">
                    s/d
                </span>
                <input value="<?php echo $tgl2; ?>" class="date-picker" id="tgl2" name="tgl2" type="text" data-date-format="dd-mm-yyyy" />
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            cari
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
            <i class="icon-undo bigger-110"></i>
            Reset
        </button>
        &nbsp; &nbsp; &nbsp;
        <button class="btn btn-success" id="btnexport">
            <i class="icon-download-alt bigger-110"></i>
            Export Excel
        </button>
    </div>
    <input type="hidden" value="<?php echo $page; ?>" id="vpage" name="vpage">
    </form>
    <ul class="pager">
        <li class="previous">
            <a id="btnprev" href="#">&larr; Prev</a>
        </li>
        <li>
            <input type="text" value="<?php echo $page; ?>" name="pageindex" id="pageindex" class="span1">
            <input type="text" value="<?php echo $maxpage ?>" disabled="true" name="maxpage" id="maxpage" class="span1">
            
        </li>
        <li class="next">
            <a id="btnnext" href="#">next &rarr;</a>
        </li>
    </ul>
    <div class="table-header">
        List Surat Keluar
    </div>
    <table id="list-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>                
                <th>Nomor</th>
                <th>Tahun</th>
                <th>No. Surat</th>
                <th>Tgl. Surat</th>
                <th>No. Terkait</th>
                <th>Konseptor</th>
                <th>Kepada</th>
                <th>No. Kirim</th>
                <th>Tgl. Kirim</th>
                <th>Perihal</th>
                <th>Tujuan</th>
                <th>Tembusan</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listsurat as $v) { 
                $link = "?tahun=".$v->tahun;
                $link .= "&nomor=".$v->nomor;
                $link .= "&surat=".$v->no_surat_keluar;
            ?>
                <tr>
                    <td><?php echo $v->nomor ?></td>
                    <td><?php echo $v->tahun ?></td>
                    <td><?php echo $v->no_surat_keluar ?></td>
                    <td><?php echo displaytgl($v->tgl_surat_keluar) ?></td>
                    <td><?php echo $v->no_terkait ?></td>
                    <td><?php echo $v->konseptor ?></td>
                    <td><?php echo $v->ditujukan ?></td>
                    <td><?php echo $v->no_kirim ?></td>
                    <td><?php echo displaytgl($v->tgl_kirim) ?></td>
                    <td><?php echo $v->isi_suratkeluar ?></td>
                    <td><?php echo $v->ditujukan ?></td>
                    <td><?php echo $v->tembusan ?></td>
                    <td class="td-actions">
                        <div class="hidden-phone visible-desktop action-buttons">
                            
                            <a class="green" href="<?php echo base_url(); ?>surat/suratkeluar/edit<?php echo $link;?>">
                                <i class="icon-edit bigger-130"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('footer');
?>
