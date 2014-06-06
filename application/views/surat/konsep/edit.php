<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Edit Konsep
    </h1>
</div>              
<form class="form-horizontal" id="formkonsep" method="post" action="<?php echo base_url(); ?>surat/konsep/saveedit" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="jenissk">Jenis Surat Keluar</label>
        <div class="controls">
            <select class="chzn-select" id="jenissk" disabled="true" name="jenissk" data-placeholder="Pilih Jenis Surat Keluar...">
                <option value=""></option>
                <?php
                    foreach ($listjenis as $d) {
                        echo '<option value="'.$d->kd_jenis_sd.'-'.$d->kd_jenis_sk.'"';
                        if($d->kd_jenis_sd.'-'.$d->kd_jenis_sk == $surat->kd_jenis_sd.'-'.$surat->kd_jenis_sk)
                            echo ' selected';
                        echo '>'.$d->uraian_jenis_sk.'</option>';
                    }
                 ?>
            </select>
            <input type="hidden" value="<?php echo $surat->kd_jenis_sd.'-'.$surat->kd_jenis_sk ?>" id="vjenissk" name="vjenissk">
            <input type="hidden" value="<?php echo $surat->tahun ?>" id="vtahun" name="vtahun">
            <input type="hidden" value="<?php echo $surat->nomor ?>" id="vnomor" name="vnomor">
            <input type="hidden" value="<?php echo $surat->no_surat_keluar ?>" id="vsurat" name="vsurat">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="nokonsep">No. Konsep</label>
        <div class="controls">
            <input type="text" id="nokonsep" value="<?php echo $surat->no_konsep_sk ?>" name="nokonsep" placeholder="No. Konsep" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tglkonsep">Tanggal Konsep</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input class="date-picker" value="<?php echo displaytgl($surat->tgl_konsep_sk) ?>" id="tglkonsep" name="tglkonsep" type="text" data-date-format="dd-mm-yyyy" />
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="sifatsk">Sifat Surat Keluar</label>
        <div class="controls">
            <select class="chzn-select" id="sifatsk" name="sifatsk" data-placeholder="Pilih Sifat Surat Keluar...">
                <option value=""></option>
                <?php
                    foreach ($listsifat as $d) {
                        echo '<option value="'.$d->kd_sifat.'"';
                        if($d->kd_sifat == $surat->sifat_sk)
                            echo ' selected';
                        echo '>'.$d->uraian.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div id="isiform">
    </div>
    <?php echo forminput('textpop', 'noterkait', 'No. Terkait', $surat->no_terkait, 'readonly="true"', 'modalterkait'); ?>
    <?php // echo forminput('textadd', 'batasdisposisi', 'Batas Disposisi', $surat->batas_sd, '', '', 'Hari'); ?>
    <?php echo forminput('text', 'tembusan', 'Tembusan'); ?>
    <div class="control-group">
        <label class="control-label" for="konseptor">Konseptor</label>
        <div class="controls">
            <select class="chzn-select" id="konseptor" name="konseptor" data-placeholder="Pilih Konseptor...">
                <option value=""></option>
                <?php 
                    foreach ($listkonseptor as $d) {
                        echo '<option value="'.$d->kd_unitorg.'"';
                        if($d->kd_unitorg == $surat->konseptor)
                            echo ' selected';
                        echo '>'.$d->uraian_unit.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="formemail">Dikirm Oleh</label>
        <div class="controls">
            <select class="chzn-select" id="formemail" name="formemail" data-placeholder="Pilih Konseptor...">
                <option value=""></option>
                <?php 
                    foreach ($listkonseptor as $d) {
                        echo '<option value="'.$d->kd_unitorg.'"';
                        if($d->kd_unitorg == $surat->no_kirim)
                            echo ' selected';
                        echo '>'.$d->uraian_unit.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <?php echo forminput('calendar', 'tglkirim', 'Tanggal Kirim', displaytgl($surat->tgl_kirim)); ?>
    <div class="control-group">
        <label class="control-label" for="lokasifile">Lokasi File</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input id="lokasifile" name="lokasifile" type="file" placeholder="Lokasi File" />
                <input value="<?php echo $surat->file_dokumen; ?>" id="vlokasifile" name="vlokasifile" type="hidden" />  
                <span class="add-on">
                    <a target="_blank" class="green" href="<?php echo base_url(); ?>folderupload/<?php echo $surat->file_dokumen; ?>">
                    <?php echo $surat->file_dokumen; ?>
                    </a>
                </span>
            </div>
        </div>
    </div>
    <?php if($salah){ ?>
    <label class="inline">
        <!-- <input type="checkbox" /> -->
        <span class="lbl" style="color:red;">Input Data Gagal..</span>
    </label>
    <?php } ?>
    <div class="form-actions">
        <button class="btn btn-info" type="submit">
            <i class="icon-ok bigger-110"></i>
            Submit
        </button>

        &nbsp; &nbsp; &nbsp;
        <button class="btn" type="reset">
            <i class="icon-undo bigger-110"></i>
            Reset
        </button>
        &nbsp; &nbsp; &nbsp;
        <button id="btnsetuju" class="btn btn-success" type="button">
            <i class="icon-thumbs-up bigger-110"></i>
            Setujui
        </button>
    </div>

</form>
</div>
<!-- Modal -->
  <div class="modal fade" id="modalterkait" style="width:650px;height:450px;overflow:scroll;display:none;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" id="closeterkait" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <div class="row-fluid">
            <div class="table-header">
                List Surat Masuk
            </div>
            <table id="list-table" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>                
                        <th>No. Agenda</th>
                        <th>Tgl. Agenda</th>
                        <th>No. Surat</th>
                        <th>Tgl. Surat</th>
                        <th>Asal Surat</th>
                        <th>Perihal</th>
                        <th>Kepada</th>
                        <th>Disposisi</th>
                        <th>Selama</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($listterkait as $v) { 
                        $link = "?thn=".$v->tahun;
                        $link .= "&jenis=".$v->kd_jenis_sm;
                        $link .= "&agenda=".$v->no_agenda;
                        $link .= "&unit=".$v->kd_unitorg;
                        $link .= "&surat=".$v->no_surat;
                    ?>
                        <tr>
                            <td><a href="#" onClick="ambil('<?php echo $v->no_surat ?>');"><?php echo $v->no_agenda ?></a></td>
                            <td><?php echo displaytgl($v->tgl_agenda) ?></td>
                            <td><?php echo $v->no_surat ?></td>
                            <td><?php echo displaytgl($v->tgl_surat) ?></td>
                            <td><?php echo $v->instansi_asal ?></td>
                            <td><?php echo $v->perihal ?></td>
                            <td><?php echo $v->ditujukan ?></td>
                            <td><?php echo $v->disposisi ?></td>
                            <td><?php echo $v->batas_selesai_disp ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('footer');
?>
