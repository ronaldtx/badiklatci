<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
if(pagemax($listsurat[0]->jmldata)==0)
    $maxpage = 1;
else
    $maxpage = pagemax($listsurat[0]->jmldata);
?>

              
<div class="row-fluid">
    <form id="formlist" class="form-horizontal" method="post" action="<?php echo base_url(); ?>surat/suratmasuk">
    <div class="control-group">
        <label class="control-label" for="tglagenda">Kata Kunci</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input value="<?php echo $cari; ?>" id="cari" name="cari" type="text" />
            </div>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="jenissm">Jenis Surat Masuk</label>
        <div class="controls">
            <select id="jenissm" name="jenissm" data-placeholder="Pilih Jenis Surat Masuk...">
                <option value=""></option>
                <?php 
                    foreach ($listjenis as $d) {
                        echo '<option value="'.$d->kd_jenis_sm.'"';
                        if($d->kd_jenis_sm == $jenissm)
                            echo ' selected';
                        echo '>'.$d->uraian_jenis_sm.'</option>';
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
        List Surat Masuk
    </div>
    <table id="list-table" class="table table-bordered table-hover">
        <thead>
            <tr>                
                <th>No.&nbsp;Agenda</th>
                <th>Tgl.&nbsp;Agenda</th>
                <th>No.&nbsp;Surat</th>
                <th>Tgl.&nbsp;Surat</th>
                <th>Asal&nbsp;Surat</th>
                <th>Perihal</th>
                <th>Kepada</th>
                <th>Status</th>
                <th>Disposisi</th>
                <th>Tgl. Disposisi</th>
                <th>Selama</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listsurat as $v) { 
                $link = "?id=".$v->id;
                if(date("U", strtotime($v->tgl_agenda. " +".$v->batas_selesai_disp." days")) < date("U"))
                    $class = ' class="merah"';
                else
                    $class = '';

            ?>
                <tr<?php echo $class; ?>>
                    <td><?php echo $v->no_agenda ?></td>
                    <td><?php echo displaytgl($v->tgl_agenda) ?></td>
                    <td><?php echo $v->no_surat ?></td>
                    <td><?php echo displaytgl($v->tgl_surat) ?></td>
                    <td><?php echo $v->instansi_asal ?></td>
                    <td><?php echo $v->perihal ?></td>
                    <td><?php echo $v->ditujukan ?></td>
                    <td><?php echo getStatusSM($v->kd_status_sm) ?></td>
                    <td><?php echo $v->disposisi ?></td>
                    <td><?php echo displaytgl($v->tgl_posting) ?></td>
                    <td><?php echo $v->batas_selesai_disp ?></td>
                    <td class="td-actions">
                        <div class="hidden-phone visible-desktop action-buttons">
                            
                            <a class="green" href="<?php echo base_url(); ?>surat/suratmasuk/edit<?php echo $link;?>">
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
