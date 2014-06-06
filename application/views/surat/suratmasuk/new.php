<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Input Surat Masuk
    </h1>
</div>              
<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>surat/suratmasuk/savenew" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="jenissm">Jenis Surat Masuk</label>
        <div class="controls">
            <select class="chzn-select" id="jenissm" name="jenissm" data-placeholder="Pilih Jenis Surat Masuk...">
                <option value=""></option>
                <?php 
                    foreach ($listjenis as $d) {
                        echo '<option value="'.$d->kd_jenis_sm.'">'.$d->uraian_jenis_sm.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="sifatsm">Sifat Surat Masuk</label>
        <div class="controls">
            <select class="chzn-select" id="sifatsm" name="sifatsm" data-placeholder="Pilih Sifat Surat Masuk...">
                <option value=""></option>
                <?php 
                    foreach ($listsifat as $d) {
                        echo '<option value="'.$d->kd_sifat.'">'.$d->uraian.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="agenda_left">No. Agenda</label>
        <div class="controls">
            <input type="text" id="agenda_left" readonly="true" value="" name="agenda_left" placeholder="No. Agenda" />
            <input type="text" id="agenda_right" required value="" name="agenda_right" placeholder="No. Agenda" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tglagenda">Tanggal Agenda</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input class="date-picker" id="tglagenda" name="tglagenda" type="text" data-date-format="dd-mm-yyyy" />
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="nosurat">No. Surat</label>
        <div class="controls">
            <input type="text" id="nosurat" value="" name="nosurat" placeholder="No. Surat" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tglsurat">Tanggal Surat</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input class="date-picker" id="tglsurat" name="tglsurat" type="text" data-date-format="dd-mm-yyyy" />
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="asalsurat">Asal Surat</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input id="asalsurat" name="asalsurat" type="text" placeholder="Asal Surat" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="perihal">Perihal</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="perihal" name="perihal" placeholder="Perihal" /></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="ditujukan">Ditujukan</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="ditujukan" name="ditujukan" placeholder="Ditujukan" /></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="diteruskan">Diteruskan</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="diteruskan" name="diteruskan" placeholder="Diteruskan" /></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="disposisi">Disposisi</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="disposisi" name="disposisi" placeholder="Disposisi" /></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="batasdisposisi">Batas Disposisi</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input id="batasdisposisi" value="4" name="batasdisposisi" type="text" placeholder="Batas Disposisi" />  
                <span class="add-on">
                    Hari
                </span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="keterangan">Keterangan</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="keterangan" name="keterangan" placeholder="Keterangan" /></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="lampiran">Lampiran</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="lampiran" name="lampiran" placeholder="Lampiran" /></textarea>
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
        <label class="control-label" for="statussm">Status Surat Masuk</label>
        <div class="controls">
        	<select class="chzn-select" id="statussm" name="statussm" data-placeholder="Pilih Status Surat Masuk...">
                <option value=""></option>
                <?php 
                    foreach ($liststatus as $d) {
                        echo '<option value="'.$d->kd_status_sm.'">'.$d->uraian_status_sm.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <?php echo forminput('text', 'noterkait', 'No. Terkait'); ?>

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
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('footer');
?>
