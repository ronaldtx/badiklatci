<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Input Konsep Surat Keluar
    </h1>
</div>              
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>surat/konsep/savenew" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="jenissk">Jenis Surat Keluar</label>
        <div class="controls">
        	<select class="chzn-select" id="jenissk" name="jenissk" data-placeholder="Pilih Jenis Surat Keluar...">
                <option value=""></option>
                <?php 
                    foreach ($listjenis as $d) {
                        echo '<option value="'.$d->kd_jenis_sd.'-'.$d->kd_jenis_sk.'">'.$d->uraian_jenis_sk.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="konsep_left">No. Konsep</label>
        <div class="controls">
            <input type="text" id="konsep_left" readonly="true" value="" name="konsep_left" placeholder="No. Konsep" />
            <input type="text" id="konsep_right" required value="" name="konsep_right" placeholder="No. Konsep" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tglkonsep">Tanggal Konsep</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input class="date-picker" id="tglkonsep" name="tglkonsep" type="text" data-date-format="dd-mm-yyyy" />
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
                        echo '<option value="'.$d->kd_sifat.'">'.$d->uraian.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
        <?php echo forminput('textpop', 'noterkait', 'No. Terkait', '', 'readonly="true"', 'modalterkait'); ?>

    <div class="control-group">
        <label class="control-label" for="konseptor">Konseptor</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input id="konseptor" name="konseptor" type="text" placeholder="Konseptor" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="lokasifile">Lokasi File</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input id="lokasifile" name="lokasifile" type="file" placeholder="Lokasi File" />  
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="penerima">Dikirim Ke</label>
        <div class="controls">
        	<select class="chzn-select" id="penerima" name="penerima" data-placeholder="Pilih Dikirim Ke...">
                <option value=""></option>
                <?php 
                    foreach ($listpenerima as $d) {
                        echo '<option value="'.$d->kd_unitorg.'">'.$d->uraian_unit.'</option>';
                    }
                 ?>
            </select>
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
