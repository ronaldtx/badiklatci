<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
if(pagemax($listsurat[0]->jmldata)==0)
    $maxpage = 1;
else
    $maxpage = pagemax($listsurat[0]->jmldata);
?>

              
<div class="row-fluid">
    <div class="table-header">
        Tracking Surat Masuk
    </div>
    <table id="list-table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Id</th>
                <th>Id Parent</th>
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
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listsurat as $v) { 
                // $link = "?id=".$v->id;
                // if(date("U", strtotime($v->tgl_agenda. " +".$v->batas_selesai_disp." days")) < date("U"))
                //     $class = ' class="merah"';
                // else
                //     $class = '';

            ?>
                <tr>
                    <td><?php echo $v->id ?></td>
                    <td><?php echo $v->parent ?></td>
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
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('footer');
?>
