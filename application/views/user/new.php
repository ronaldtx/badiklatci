<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Input User
    </h1>
</div>              
<form id="myform" class="form-horizontal" method="post" action="<?php echo base_url(); ?>user/savenew">
    <?php echo forminput('text', 'userid', 'Userid'); ?>
    <?php echo forminput('password', 'pwd', 'Password'); ?>
    <?php echo forminput('password', 'pwd_again', 'Ulangi Password'); ?>
    <div class="control-group">
        <label class="control-label" for="kd_level">Level</label>
        <div class="controls">
        	<select class="chzn-select" id="kd_level" name="kd_level" data-placeholder="Pilih Level...">
                <option value=""></option>
                <?php 
                    foreach ($listlevel as $d) {
                        echo '<option value="'.$d->kd_level.'">'.$d->uraian_level.'</option>';
                    }
                 ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="unitorg">Unit Org</label>
        <div class="controls">
        	<select class="chzn-select" id="unitorg" name="unitorg" data-placeholder="Pilih Unit Org...">
                <option value=""></option>
                <?php 
                    foreach ($listunit as $d) {
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
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('footer');
?>
