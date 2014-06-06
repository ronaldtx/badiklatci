<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suratkeluar extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -  
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('suratmasuk_model');
        $this->load->model('suratkeluar_model');
    }
    public function index()
    {
        if($this->session->userdata('UserName')){
            if(!empty($_POST)){
                $data['page'] = $_POST['vpage'];
                $data['cari'] = $_POST['cari'];
                $data['tgl1'] = $_POST['tgl1'];
                $data['tgl2'] = $_POST['tgl2'];
                $pencarian = " AND (no_terkait LIKE '%".$data['cari']."%'";
                $pencarian .= " OR no_surat_keluar LIKE '%".$data['cari']."%'";
                $pencarian .= " OR konseptor LIKE '%".$data['cari']."%'";
                $pencarian .= " OR no_kirim LIKE '%".$data['cari']."%'";
                $pencarian .= " OR nomor LIKE '%".$data['cari']."%'";
                $pencarian .= " OR ditujukan LIKE '%".$data['cari']."%')";
                if(mysqltgl($data['tgl1'])!="--" || mysqltgl($data['tgl2'])!="--")
                    $cond = "AND tgl_surat_keluar BETWEEN '".mysqltgl($data['tgl1'])."' AND '".mysqltgl($data['tgl2'])."'";
                else
                    $cond ="";
                $cond .=$pencarian;
            } 
            else{
                $data['page'] = 1;
                $data['cari'] = '';
                $data['tgl1'] = '';
                $data['tgl2'] = '';
                $cond ="";
            }
            $data['breadcrumb'] = '<span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active">Surat Masuk</li>';
            $data['jsfooter'] = '<script type="text/javascript">
                $(function() {
                    $("#btnnext").click(function(){
                        var newpage = parseInt($("#vpage").val())+1;
                        if(parseInt($("#maxpage").val())>=newpage)
                            $("#vpage").val(newpage);
                        else
                            $("#vpage").val($("#vpage").val());
                        $("#formlist").submit();
                    });
                    $("#btnprev").click(function(){
                        var newpage = parseInt($("#vpage").val())-1;
                        if(newpage>0)
                            $("#vpage").val(newpage);
                        else
                            $("#vpage").val($("#vpage").val());
                        $("#formlist").submit();
                    });
                    $("#pageindex").keypress(function (e) {
                      if (e.which == 13) {
                        var newpage = parseInt($("#pageindex").val());
                        if(newpage>0 && parseInt($("#maxpage").val())>=newpage)
                            $("#vpage").val(newpage);
                        else
                            $("#vpage").val($("#vpage").val());
                        $("#formlist").submit();
                        return false;
                      }
                    });
                    $("#btnexport").click(function(){
                        window.open("'.base_url().'export/esuratkeluar?cari='.$data["cari"].'&tgl1='.$data["tgl1"].'&tgl2='.$data["tgl2"].'");
                    });
                    $(".date-picker").datepicker().next().on(ace.click_event, function(){
                      $(this).prev().focus();
                    });
                });
                </script>';
            $data['listsurat'] = $this->suratkeluar_model->listall($cond, $data['page']);
            $this->load->view('surat/suratkeluar/list', $data);
        }
        else{
            redirect(base_url(), 'location');
        }
        
    }
    public function create(){
        if($this->session->userdata('UserName')){
            if(isset($_GET['a']))
                $data['salah'] = true;
            else
                $data['salah'] = false;

            $data['breadcrumb'] = '<span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active"><a href="'.base_url().'surat/suratkeluar">Surat Keluar</a></li>
                <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active">Create</li>';
            $data['jsfooter'] = '<script type="text/javascript">
                function ambil(a){
                    $("#noterkait").val(a);
                    $("#closeterkait").click();
                }
                $(function() {
                    $(".chzn-select").chosen();
                    $(".date-picker").datepicker().next().on(ace.click_event, function(){
                      $(this).prev().focus();
                    });
                    $("#jenissm").change(function(){
                        $.post("'.base_url().'ajax/jenissuratsm",{jenis:$(this).val()},function(result){
                            $("#agenda_left").val(result);
                        });
                    });
                    $("#jenissk").change(function(){
                        $.post("'.base_url().'ajax/jenissuratsktk",{jenis:$(this).val()},function(result){
                            var tmp = result.split("###");
                            $("#nosurat_left").val(tmp[0]);
                            $("#isiform").html(tmp[1]);
                        });
                    });
                })
                </script>';
            if ($this->session->userdata('Level') == "1")
                $cond = "order by kd_sifat";
            else
                $cond = "where kd_sifat <> '10' and  kd_sifat <> '11' order by kd_sifat";

            $condx = "WHERE kd_unitorg LIKE '1%0'";
            $data['listkonseptor'] = listall('t_par_unitorg', $condx);
            
            $order = "ORDER BY kd_jenis_sd, kd_jenis_sk";
            $data['listjenis'] = listall('t_par_jenis_sk', $order);
            $data['listsifat'] = listall('t_par_sifat_sk', $cond);
            $data['liststatus'] = listall('t_par_status_sm');
            $data['listterkait'] = $this->suratmasuk_model->listall();
            // $data['noagenda'] = maxKode('t_trn_sm', 'no_agenda');
            // $data['listuser'] = $this->user_model->listall();
            $this->load->view('surat/suratkeluar/new', $data);
        }
        else{
            redirect(base_url(), 'location');
        }
        
    }
    public function edit(){
        // echo $this->uri->segment(3);
        if($this->session->userdata('UserName')){
            if(isset($_GET['a']))
                $data['salah'] = true;
            else
                $data['salah'] = false;

            $v['tahun'] = $_GET['tahun'];
            $v['surat'] = $_GET['surat'];
            $v['nomor'] = $_GET['nomor'];
            $data['surat'] = $this->suratkeluar_model->getonedata($v);
            $data['breadcrumb'] = '<span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active"><a href="'.base_url().'surat/suratkeluar">Surat Keluar</a></li>
                <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active">Edit</li>';
            $data['jsfooter'] = '<script type="text/javascript">
                $(function() {
                    $(".chzn-select").chosen();
                    $(".date-picker").datepicker().next().on(ace.click_event, function(){
                      $(this).prev().focus();
                    });
                    $.post("'.base_url().'ajax/jenissuratsktke",{
                        jenis:$("#vjenissk").val(),tahun:$("#vtahun").val(),
                        nomor:$("#vnomor").val()},
                        function(result){
                        var tmp = result.split("###");
                        $("#nosurat_left").val(tmp[0]);
                        $("#isiform").html(tmp[1]);
                    });
                })
                </script>';

            if ($this->session->userdata('Level') == "1")
                $cond = "order by kd_sifat";
            else
                $cond = "where kd_sifat <> '10' and  kd_sifat <> '11' order by kd_sifat";

            $order = "ORDER BY kd_jenis_sd, kd_jenis_sk";
            $condx = "WHERE kd_unitorg LIKE '1%0'";
            $data['listkonseptor'] = listall('t_par_unitorg', $condx);
            
            $data['listjenis'] = listall('t_par_jenis_sk', $order);
            $data['listsifat'] = listall('t_par_sifat_sk', $cond);
            $data['liststatus'] = listall('t_par_status_sm');
            if(!empty($data['surat'])){
                $this->load->view('surat/suratkeluar/edit', $data);
            }
            else{
                redirect(base_url()."surat/suratkeluar", 'location');
            }
        }
        else{
            redirect(base_url(), 'location');
        }
    }
    public function savenew(){
        // print_r($_POST);
        // exit;
        if($this->suratkeluar_model->create($_POST)=='success'){
            redirect(base_url()."surat/suratkeluar", 'location');
        }
        else{
            redirect(base_url()."surat/suratkeluar/create/?a=w", 'location');
        }

    }
    public function saveedit(){
        // print_r($_POST);
        // exit;
        if($this->suratkeluar_model->edit($_POST)=='success'){
            redirect(base_url()."surat/suratkeluar", 'location');
        }
        else{
            redirect(base_url()."surat/suratkeluar/edit/".$_POST['id']."/?a=w", 'location');
        }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */