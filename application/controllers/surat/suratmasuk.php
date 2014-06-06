<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Suratmasuk extends CI_Controller {

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
        $this->load->model('user_model');
    }
    public function index()
    {
        if($this->session->userdata('UserName')){
            if(!empty($_POST)){
                $data['page'] = $_POST['vpage'];
                // exit($data['page']."asds");
                $data['cari'] = $_POST['cari'];
                $data['tgl1'] = $_POST['tgl1'];
                $data['tgl2'] = $_POST['tgl2'];
                $pencarian = " AND (no_agenda LIKE '%".$data['cari']."%'";
                $pencarian .= " OR no_surat LIKE '%".$data['cari']."%'";
                $pencarian .= " OR instansi_asal LIKE '%".$data['cari']."%'";
                $pencarian .= " OR perihal LIKE '%".$data['cari']."%'";
                $pencarian .= " OR ditujukan LIKE '%".$data['cari']."%'";
                $pencarian .= " OR disposisi LIKE '%".$data['cari']."%')";
                if(mysqltgl($data['tgl1'])!="--" || mysqltgl($data['tgl2'])!="--")
                    $cond = "AND tgl_surat BETWEEN '".mysqltgl($data['tgl1'])."' AND '".mysqltgl($data['tgl2'])."'";
                else
                    $cond ="";$cond .=$pencarian;
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
                    $("#btnexport").click(function(){
                        window.open("'.base_url().'export/esuratmasuk?cari='.$data["cari"].'&tgl1='.$data["tgl1"].'&tgl2='.$data["tgl2"].'");
                    });
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
                    $(".date-picker").datepicker().next().on(ace.click_event, function(){
                      $(this).prev().focus();
                    });
                });
                </script>';
            $data['listsurat'] = $this->suratmasuk_model->listall($cond, $data['page']);
            // print_r($data['listsurat']);
            // exit;
            // exit($data['listsurat']->)
            $this->load->view('surat/suratmasuk/list', $data);
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
                <li class="active"><a href="'.base_url().'surat/suratmasuk">Surat Masuk</a></li>
                <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active">Create</li>';
            $data['jsfooter'] = '<script type="text/javascript">
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
                })
                </script>';
            if ($this->session->userdata('UnitOrg') == "0000")
                $cond = "where kd_jenis_sm NOT IN ('40', '50')";
            else
                $cond = "where kd_jenis_sm IN ('40', '50')";
            $data['listjenis'] = listall('t_par_jenis_sm', $cond);
            $data['listsifat'] = listall('t_par_sifat_sm');
            $data['liststatus'] = listall('t_par_status_sm');
            // $data['noagenda'] = maxKode('t_trn_sm', 'no_agenda');
            // $data['listuser'] = $this->user_model->listall();
            $this->load->view('surat/suratmasuk/new', $data);
        }
        else{
            redirect(base_url(), 'location');
        }
        
    }
    public function edit(){
        // echo $this->uri->segment(3);
        if($this->session->userdata('UserName')){
            $data['errmsg'] ="Input Data Gagal..";
            if(isset($_GET['a'])){
                $data['salah'] = true;
                if($_GET['a']=="x")
                    $data['errmsg'] ="Data Posting Sudah ada..";
            }
            else{
                $data['salah'] = false;
            }
            $v['tahun'] = $_GET['thn'];
            $v['agenda'] = $_GET['agenda'];
            $v['surat'] = $_GET['surat'];
            $v['jenis'] = $_GET['jenis'];
            $v['unit'] = $_GET['unit'];

            if ($this->session->userdata('UnitOrg') == "0000")
                $cond = "where kd_jenis_sm NOT IN ('40', '50')";
            else
                $cond = "where kd_jenis_sm IN ('40', '50')";

            $condx = "WHERE kd_unitorg LIKE '1%0' OR kd_unitorg like '".$this->session->userdata('UnitOrg')."%'";
            $data['surat'] = $this->suratmasuk_model->getonedata($v);
            $data['listjenis'] = listall('t_par_jenis_sm', $cond);
            $data['listsifat'] = listall('t_par_sifat_sm');
            $data['liststatus'] = listall('t_par_status_sm');
            $data['listposting'] = listall('t_par_unitorg', $condx);
            $data['listsurat'] = $this->suratmasuk_model->getdataposting($v);
            $data['breadcrumb'] = '<span class="divider">
                    <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active"><a href="'.base_url().'surat/suratmasuk">Surat Masuk</a></li>
                <i class="icon-angle-right arrow-icon"></i>
                  </span>
                <li class="active">Edit</li>';
            $data['jsfooter'] = '<script type="text/javascript">
                $(function() {
                    $(".chzn-select").chosen();
                    $("#postingsm").change(function(){
                        $("#formsm").attr("action", "'.base_url().'surat/suratmasuk/saveposting")
                        $("#formsm").submit();
                    });
                    $(".date-picker").datepicker().next().on(ace.click_event, function(){
                      $(this).prev().focus();
                    });
                })
                </script>';
            
            if(!empty($data['surat'])){
            $this->load->view('surat/suratmasuk/edit', $data);
            }
            else{
                redirect(base_url()."surat/suratmasuk", 'location');
            }
        }
        else{
            redirect(base_url(), 'location');
        }
    }
    public function savenew(){
        // print_r($_POST);
        // exit;
        if($this->suratmasuk_model->create($_POST)=='success'){
            redirect(base_url()."surat/suratmasuk", 'location');
        }
        else{
            redirect(base_url()."surat/suratmasuk/create/?a=w", 'location');
        }

    }
    public function saveedit(){
        $link = "?thn=".$_POST['vtahun'];
        $link .= "&jenis=".$_POST['vjenissm'];
        $link .= "&agenda=".$_POST['vagenda'];
        $link .= "&unit=".$_POST['vunit'];
        $link .= "&surat=".$_POST['vsurat'];

        if($this->suratmasuk_model->edit($_POST)=='success'){
            redirect(base_url()."surat/suratmasuk", 'location');
        }
        else{
            redirect(base_url()."surat/suratmasuk/edit".$link."&a=w", 'location');
        }

    }
    public function saveposting(){
        $link = "?thn=".$_POST['vtahun'];
        $link .= "&jenis=".$_POST['vjenissm'];
        $link .= "&agenda=".$_POST['vagenda'];
        $link .= "&unit=".$_POST['vunit'];
        $link .= "&surat=".$_POST['vsurat'];
        $result = $this->suratmasuk_model->posting($_POST);
        switch ($result) {
            case 'success':
                redirect(base_url()."surat/suratmasuk/edit".$link, 'location');
                break;
            
            case 'already':
                redirect(base_url()."surat/suratmasuk/edit".$link."&a=x", 'location');
                break;
            
            default:
                redirect(base_url()."surat/suratmasuk/edit".$link."&a=w", 'location');
                break;
        }

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */