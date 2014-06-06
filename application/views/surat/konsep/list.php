<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
if(pagemax($listsurat[0]->jmldata)==0)
    $maxpage = 1;
else
    $maxpage = pagemax($listsurat[0]->jmldata);
?>
              
<div class="row-fluid">
    <form id="formlist" class="form-horizontal" method="post" action="<?php echo base_url(); ?>surat/konsep">
    <div class="control-group">
        <label class="control-label" for="tglagenda">Kata Kunci</label>

        <div class="controls">
            <div class="row-fluid input-append">
                <input value="<?php echo $cari; ?>" id="cari" name="cari" type="text" />
            </div>
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
            <a href="#">&larr; Prev</a>
        </li>
        <li>
            <input type="text" value="<?php echo $page; ?>" name="pageindex" id="pageindex" class="span1">
            <input type="text" value="<?php echo $maxpage ?>" disabled="true" name="maxpage" id="maxpage" class="span1">
        </li>
        <li class="next">
            <a href="#">next &rarr;</a>
        </li>
    </ul>
    <div class="table-header">
        List Surat Keluar
    </div>
    <table id="list-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>                
                <th>Nomor</th>
                <th>tahun</th>
                <th>No. Konsep</th>
                <th>Tgl. Konsep</th>
                <th>No. Terkait</th>
                <th>Konseptor</th>
                <th>Kepada</th>
                <th>Sifat</th>
                <th>Detail</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listsurat as $v) { 
                $link = "?tahun=".$v->tahun;
                $link .= "&nomor=".$v->nomor;
                $link .= "&konsep=".$v->no_konsep_sk;
            ?>
                <tr>
                    <td><?php echo $v->nomor ?></td>
                    <td><?php echo $v->tahun ?></td>
                    <td><?php echo $v->no_konsep_sk ?></td>
                    <td><?php echo displaytgl($v->tgl_konsep_sk) ?></td>
                    <td><?php echo $v->no_terkait ?></td>
                    <td><?php echo $v->konseptor ?></td>
                    <td><?php echo $v->ditujukan ?></td>
                    <td><?php echo $v->uraian ?></td>
                    <td class="td-actions">
                        <div class="hidden-phone visible-desktop action-buttons">
                            
                            <a class="green" href="<?php echo base_url(); ?>surat/konsep/edit<?php echo $link;?>">
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
