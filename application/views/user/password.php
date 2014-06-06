<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('header');
?>

<div class="page-content">
<div class="page-header position-relative">
    <h1>
        Ubah Password User
    </h1>
</div>              
<form id="myform" class="form-horizontal" method="post" action="<?php echo base_url(); ?>user/savepass">
    <?php echo forminput('password', 'pwd', 'Password'); ?>
    <?php echo forminput('password', 'pwd_again', 'Ulangi Password'); ?>
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
