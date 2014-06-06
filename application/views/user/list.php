<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

              
<div class="row-fluid">
    <div class="table-header">
        List User
    </div>
    <table id="list-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>                
                <th>Userid</th>
                <th>Password</th>
                <th>Level</th>
                <th>Unit Org</th>
                <th class="hidden-480">Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($listuser as $v) { ?>
                <tr>
                    <td><?php echo $v->userid ?></td>
                    <td><?php echo $v->pwd ?></td>
                    <td><?php echo $v->uraian_level ?></td>
                    <td><?php echo $v->uraian_unit ?></td>
                    <td class="td-actions">
                        <div class="hidden-phone visible-desktop action-buttons">
                            
                            <a class="green" href="<?php echo base_url(); ?>user/edit/<?php echo $v->userid; ?>">
                                <i class="icon-pencil bigger-130"></i>
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
