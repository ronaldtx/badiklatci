<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->model('user_model');
    }
    public function index()
    {
        if($this->session->userdata('UserName')){
            $data['jsfooter'] = '<script type="text/javascript">
                $(function() {
                    var oTable1 = $("#list-table").dataTable( {
                    "aoColumns": [
                      { "bSortable": false },
                      null, null, null
                      { "bSortable": false }
                    ] } );
                    $(".chzn-select").chosen();
                })
                </script>';
            $data['listuser'] = $this->user_model->listall();
            $this->load->view('user/list', $data);
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

            $data['jsfooter'] = '<script type="text/javascript">
                $(function() {
                    $(".chzn-select").chosen();
                    $( "#myform" ).validate({
                      rules: {
                        pwd: "required",
                        pwd_again: {
                          equalTo: "#pwd"
                        }
                      }
                    });
                })
                </script>';
            $data['listlevel'] = listall('t_par_leveluser');
            $data['listunit'] = listall('t_par_unitorg');
            $this->load->view('user/new', $data);
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
            $data['user'] = $this->user_model->getonedata($this->uri->segment(3));

            $data['jsfooter'] = '<script type="text/javascript">
                $(function() {
                    $(".chzn-select").chosen();
                    $( "#myform" ).validate({
                      rules: {
                        pwd: "required",
                        pwd_again: {
                          equalTo: "#pwd"
                        }
                      }
                    });
                })
                </script>';
            $data['listlevel'] = listall('t_par_leveluser');
            $data['listunit'] = listall('t_par_unitorg');
            if(!empty($data['user'])){
                $this->load->view('user/edit', $data);
            }
            else{
                redirect(base_url()."user", 'location');
            }
        }
        else{
            redirect(base_url(), 'location');
        }
    }
    public function chgpass(){
        // echo $this->uri->segment(3);
        if($this->session->userdata('UserName')){
            if(isset($_GET['a']))
                $data['salah'] = true;
            else
                $data['salah'] = false;
            $data['user'] = $this->user_model->getonedata($this->session->userdata('UserName'));

            $data['jsfooter'] = '<script type="text/javascript">
                $(function() {
                    $(".chzn-select").chosen();
                    $( "#myform" ).validate({
                      rules: {
                        pwd: "required",
                        pwd_again: {
                          equalTo: "#pwd"
                        }
                      }
                    });
                })
                </script>';
            if(!empty($data['user'])){
                $this->load->view('user/password', $data);
            }
            else{
                redirect(base_url()."user", 'location');
            }
        }
        else{
            redirect(base_url(), 'location');
        }
    }
    public function savenew(){
        // print_r($_POST);
        // exit;
        if($this->user_model->create_user($_POST)=='success'){
            redirect(base_url()."user", 'location');
        }
        else{
            redirect(base_url()."user/create/?a=w", 'location');
        }

    }
    public function saveedit(){
        if($this->user_model->edit_user($_POST)=='success'){
            redirect(base_url()."user", 'location');
        }
        else{
            redirect(base_url()."user/edit/".$_POST['id']."/?a=w", 'location');
        }

    }
    public function savepass(){
        if($this->user_model->change_password($_POST['pwd'], $this->session->userdata('UserName'))=='success'){
            redirect(base_url()."user", 'location');
        }
        else{
            redirect(base_url()."user/password/".$_POST['id']."/?a=w", 'location');
        }

    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url(), 'location');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */