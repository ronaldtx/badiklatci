              <!--PAGE CONTENT ENDS-->
            </div><!--/.span-->
          </div><!--/.row-fluid-->
        </div><!--/.page-content-->

      </div><!--/.main-content-->
    </div><!--/.main-container-->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
      <i class="icon-double-angle-up icon-only bigger-110"></i>
    </a>

    <!--basic scripts-->

    <!--[if !IE]>-->

    <script type="text/javascript">
      window.jQuery || document.write("<script src='<?php echo base_url(); ?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
    </script>

    <!--<![endif]-->

    <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

    <script type="text/javascript">
      if("ontouchend" in document) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!--page specific plugin scripts-->

    <!--[if lte IE 8]>
      <script src="assets/js/excanvas.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.easy-pie-chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.pie.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/date-time/daterangepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-colorpicker.min.js"></script>
    <!--ace scripts-->

    <script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

    <!--inline scripts related to this page-->
    <?php 
      if(isset($jsfooter)){
        echo $jsfooter;
      }
    ?>
  </body>
</html>
