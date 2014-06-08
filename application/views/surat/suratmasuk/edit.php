<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Edit Surat Masuk
    </h1>
</div>              
<form id="formsm" class="form-horizontal" method="post" action="<?php echo base_url(); ?>surat/suratmasuk/saveedit" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="jenissm">Jenis Surat Masuk</label>
        <div class="controls">
            <select class="chzn-select" disabled="true" id="jenissm" name="jenissm" data-placeholder="Pilih Jenis Surat Masuk...">
                <option value=""></option>
                <?php 
                    foreach ($listjenis as $d) {
                        echo '<option value="'.$d->kd_jenis_sm.'"';
                        if($d->kd_jenis_sm == $surat->kd_jenis_sm)
                            echo ' selected';
                        echo '>'.$d->uraian_jenis_sm.'</option>';
                    }
                 ?>
            </select>
            <input type="hidden" value="<?php echo $surat->kd_jenis_sm ?>" id="vjenissm" name="vjenissm">
            <input type="hidden" value="<?php echo $surat->tahun ?>" id="vtahun" name="vtahun">
            <input type="hidden" value="<?php echo $surat->kd_unitorg ?>" id="vunit" name="vunit">
            <input type="hidden" value="<?php echo $surat->no_surat ?>" id="vsurat" name="vsurat">
            <input type="hidden" value="<?php echo $surat->no_agenda ?>" id="vagenda" name="vagenda">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="sifatsm">Sifat Surat Masuk</label>
        <div class="controls">
            <select class="chzn-select" id="sifatsm" name="sifatsm" data-placeholder="Pilih Sifat Surat Masuk...">
                <option value=""></option>
                <?php 
                    foreach ($listsifat as $d) {
                        echo '<option value="'.$d->kd_sifat.'"';
                        if($d->kd_sifat == $surat->kd_sifat_sm)
                            echo ' selected';
                        echo '>'.$d->uraian.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="agenda_left">No. Agenda</label>
        <div class="controls">
            <input type="text" id="agenda_left" readonly="true" value="<?php echo substr($surat->no_agenda, 0, 5) ?>" name="agenda_left" placeholder="No. Agenda" />
            <input type="text" id="agenda_right" readonly="true" value="<?php echo substr($surat->no_agenda, 5) ?>" name="agenda_right" placeholder="No. Agenda" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tglagenda">Tanggal Agenda</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input class="date-picker" value="<?php echo displaytgl($surat->tgl_agenda); ?>" id="tglagenda" name="tglagenda" type="text" data-date-format="dd-mm-yyyy" />
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="nosurat">No. Surat</label>
        <div class="controls">
            <input type="text" id="nosurat" value="<?php echo $surat->no_surat ?>" name="nosurat" placeholder="No. Surat" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="tglsurat">Tanggal Surat</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input class="date-picker" value="<?php echo displaytgl($surat->tgl_surat); ?>" id="tglsurat" name="tglsurat" type="text" data-date-format="dd-mm-yyyy" />
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
                <input value="<?php echo $surat->instansi_asal; ?>" id="asalsurat" name="asalsurat" type="text" placeholder="Asal Surat" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="perihal">Perihal</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="perihal" name="perihal" placeholder="Perihal" /><?php echo $surat->perihal; ?></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="ditujukan">Ditujukan</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="ditujukan" name="ditujukan" placeholder="Ditujukan" /><?php echo $surat->ditujukan; ?></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="diteruskan">Diteruskan</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="diteruskan" name="diteruskan" placeholder="Diteruskan" /><?php echo $surat->diteruskan; ?></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="disposisi">Disposisi</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="disposisi" name="disposisi" placeholder="Disposisi" /><?php echo $surat->disposisi; ?></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="batasdisposisi">Batas Disposisi</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input value="<?php echo $surat->batas_selesai_disp; ?>" id="batasdisposisi" name="batasdisposisi" type="text" placeholder="Batas Disposisi" />  
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
                <textarea id="keterangan" name="keterangan" placeholder="Keterangan" /><?php echo $surat->keterangan; ?></textarea>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="lampiran">Lampiran</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <textarea id="lampiran" name="lampiran" placeholder="Lampiran" /><?php echo $surat->lampiran; ?></textarea>
            </div>
        </div>
    </div>
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
    <div class="control-group">
        <label class="control-label" for="statussm">Status Surat Masuk</label>
        <div class="controls">
        	<select class="chzn-select" id="statussm" name="statussm" data-placeholder="Pilih Status Surat Masuk...">
                <option value=""></option>
                <?php 
                    foreach ($liststatus as $d) {
                        echo '<option value="'.$d->kd_status_sm.'"';
                        if($d->kd_status_sm == $surat->kd_status_sm)
                            echo ' selected';
                        echo '>'.$d->uraian_status_sm.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <?php echo forminput('text', 'noterkait', 'No. Terkait', $surat->no_terkait); ?>

    <?php if($salah){ ?>
    <label class="inline">
        <!-- <input type="checkbox" /> -->
        <span class="lbl" style="color:red;"><?php echo $errmsg; ?></span>
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

<hr>
<div class="control-group">
    <label class="control-label" for="postingsm">Posting Surat Masuk</label>
    <div class="controls">
        <select class="chzn-select" id="postingsm" name="postingsm" data-placeholder="Pilih Posting Surat Masuk...">
            <option value=""></option>
            <?php 
                foreach ($listposting as $d) {
                    echo '<option value="'.$d->kd_unitorg.'">'.$d->uraian_unit.'</option>';
                }
             ?>
        </select>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="aksism">Aksi Surat Masuk</label>
    <div class="controls">
    <label>
        <input name="aksi[]" type="checkbox" value="Untuk diketahui sebagai informasi" />
        <span class="lbl">Untuk diketahui sebagai informasi</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Untuk diselesaikan" />
        <span class="lbl">Untuk diselesaikan</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Tanggapan dan saran" />
        <span class="lbl">Tanggapan dan saran</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Dibahas bersama dengan Kabadiklat" />
        <span class="lbl">Dibahas bersama dengan Kabadiklat</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Dibahas dalam rapat pimpinan" />
        <span class="lbl">Dibahas dalam rapat pimpinan</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Untuk dijadwalkan" />
        <span class="lbl">Untuk dijadwalkan</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Siapkan jawaban" />
        <span class="lbl">Siapkan jawaban</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Supaya menghadap" />
        <span class="lbl">Supaya menghadap</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Buat resume" />
        <span class="lbl">Buat resume</span>
    </label>
    <label>
        <input name="aksi[]" type="checkbox" value="Simpan(File)" />
        <span class="lbl">Simpan(File)</span>
    </label>
    </div>
</div>
</form>
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
                <th>Unitorg</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listsurat as $v) { 
                $link = "?thn=".$v->tahun;
                $link .= "&jenis=".$v->kd_jenis_sm;
                $link .= "&agenda=".$v->no_agenda;
                $link .= "&unit=".$v->kd_unitorg;
                $link .= "&surat=".$v->no_surat;
            ?>
                <tr>
                    <td><?php echo $v->no_agenda ?></td>
                    <td><?php echo $v->tgl_agenda ?></td>
                    <td><?php echo $v->no_surat ?></td>
                    <td><?php echo $v->tgl_surat ?></td>
                    <td><?php echo $v->instansi_asal ?></td>
                    <td><?php echo $v->perihal ?></td>
                    <td><?php echo $v->ditujukan ?></td>
                    <td><?php echo $v->disposisi ?></td>
                    <td><?php echo $v->batas_selesai_disp ?></td>
                    <td><?php echo $v->uraian_unit ?></td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('footer');
?>
