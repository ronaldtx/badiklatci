<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
        // $this->load->model('perbaikan_model');
        // $this->load->model('barang_model');
        // $this->load->model('user_model');
    }
    public function index()
    {
        exit;        
    }
    public function jenissuratsm(){
        $cond = "WHERE kd_unitorg='".$this->session->userdata('UnitOrg')."' AND kd_jenis_sm='".$_POST['jenis']."' AND tahun='".date("Y")."'";
        $output = maxKode('t_trn_sm', 'no_agenda', $cond);
        echo $output."/";
    }
    public function jenissuratsk(){
        $kode = explode("-", $_POST['jenis']);
        $cond = "WHERE no_unitorg='".$this->session->userdata('UnitOrg')."' AND kd_jenis_sd='".$kode[0]."'  AND kd_jenis_sk='".$kode[1]."' AND tahun='".date("Y")."'";
        $output = maxKode('t_trn_konsepsk', 'no_konsep_sk', $cond);
        echo $output."/SBDU/";
    }
    public function jenissuratsktk(){
        $kode = explode("-", $_POST['jenis']);
        $cond = "WHERE no_unitorg='".$this->session->userdata('UnitOrg')."' AND kd_jenis_sd='".$kode[0]."'  AND kd_jenis_sk='".$kode[1]."' AND tahun='".date("Y")."'";
        $output = maxKode2('t_trn_sk', 'no_surat_keluar', $cond, 1, 5);
        $form = $this->isiformsk($_POST['jenis']);
        echo $output."/"."###".$form;
    }
    public function jenissuratsktke(){
        $kode = explode("-", $_POST['jenis']);
        $cond = "WHERE no_unitorg='0000' AND kd_jenis_sd='".$kode[0]."'  AND kd_jenis_sk='".$kode[1]."' AND tahun='".date("Y")."'";
        $output = maxKode2('t_trn_konsepsk', 'no_konsep_sk', $cond);
        $form = $this->isiformskedit($_POST['jenis'], $_POST['tahun'], $_POST['nomor'], $_POST['konsep']);
        echo $output."/"."###".$form;
    }
    public function isiformsk($jenissk){
        $output = '';
        switch ($jenissk) {
            case '1-10':
                $output.=forminput('text', 'lampiran', 'Lampiran');
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'ditujukan', 'Ditujukan');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'kota', 'Kota');
                $output.=forminput('text', 'kodepos', 'Kode Pos');
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');               
                break;
            
            case '1-11':
                $output.=forminput('text', 'lampiran', 'Lampiran');
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'ditujukan', 'Ditujukan');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'kota', 'Kota');
                $output.=forminput('text', 'kodepos', 'Kode Pos');
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;

            case '1-12':
                $output.=forminput('text', 'lampiran', 'Lampiran');
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'ditujukan', 'Ditujukan');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'kota', 'Kota');
                $output.=forminput('text', 'kodepos', 'Kode Pos');
                $output.=forminput('calendar', 'tgl_nosurat', 'Tgl No Surat');
                $output.=forminput('text', 'jumlah', 'Jumlah');
                $output.=forminput('area', 'isi', 'Uraian');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;

            case '1-13':
                $output.=forminput('text', 'lampiran', 'Lampiran');
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'ditujukan', 'Ditujukan');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'kota', 'Kota');
                $output.=forminput('text', 'kodepos', 'Kode Pos');
                $output.=forminput('area', 'isi', 'Uraian');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;

            case '1-14':
                $output.=forminput('area', 'isi', 'Uraian');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');
                $output.=forminput('text', 'kantor', 'Kantor');
                $output.=forminput('text', 'alamat1', 'Alamat');                                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'alamat2', 'Alamat');
                $output.=forminput('text', 'nip2', 'NIP');
                break;

            case '1-15':
                $output.=forminput('area', 'isi', 'Uraian');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                $output.=forminput('text', 'mengetahui', 'Mengetahui');
                break;

            case '1-16':
                $output.=forminput('text', 'tentang', 'Subject');
                $output.=forminput('text', 'ditujukan', 'Ditujukan');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'kota', 'Kota');
                $output.=forminput('text', 'kodepos', 'Kode Pos');
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;

            case '1-20':
                $output.=forminput('text', 'dari', 'Dari');
                $output.=forminput('text', 'ditujukan', 'Ditujukan');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'kota', 'Kota');
                $output.=forminput('text', 'kodepos', 'Kode Pos');
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break; 

            case '2-12':
                $output.=forminput('text', 'tentang', 'Tentang');
                $output.=forminput('text', 'membaca', 'Membaca');
                $output.=forminput('text', 'menimbang', 'Menimbang');
                $output.=forminput('text', 'mengingat', 'Mengingat');
                $output.=forminput('text', 'kepada', 'Kepada');
                $output.=forminput('area', 'untuk', 'Untuk');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break; 

            case '2-13':
                $output.=forminput('text', 'tentang', 'Tentang');
                $output.=forminput('text', 'menimbang', 'Menimbang');
                $output.=forminput('text', 'mengingat', 'Mengingat');
                $output.=forminput('text', 'memperhatikan', 'Memperhatikan');
                $output.=forminput('text', 'kepada', 'Kepada');
                $output.=forminput('area', 'untuk', 'Untuk');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;     

            case '2-14':
                $output.=forminput('text', 'ditujukan', 'Ditujukan');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'kota', 'Kota');
                $output.=forminput('text', 'kodepos', 'Kode Pos');
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break; 

            case '2-15':
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;  

           case '2-16':
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;   

           case '2-17':
                $output.=forminput('area', 'isi', 'Isi');
                $output.=forminput('text', 'ditetapkandi', 'Dibuat di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Perjanjian');
                $output.=forminput('text', 'jabatan1', 'Jabatan Pihak Pertama');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan'); 
                $output.=forminput('text', 'alamat', 'Alamat');                                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan Pihak Kedua');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'namaorg', 'Nama Organisasi');
                $output.=forminput('text', 'alamat', 'Alamat');
                $output.=forminput('text', 'nip2', 'NIP');
                break;        

           case '2-18':
                $output.=forminput('text', 'tentang', 'Tentang');
                $output.=forminput('text', 'membaca', 'Pasal 1');
                $output.=forminput('text', 'ditujukan', 'Pasal 2');
                $output.=forminput('text', 'menimbang', 'Pasal 3');
                $output.=forminput('text', 'mengingat', 'Pasal 4');
                $output.=forminput('text', 'memperhatikan', 'Pasal 5');
                $output.=forminput('text', 'pasal7', 'Pasal 7');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;  

           case '2-19':
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break; 

           case '2-20':
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;

           case '2-21':
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;  

           case '2-22':
                $output.=forminput('text', 'tentang', 'Hal');
                $output.=forminput('text', 'isi', 'Isi');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                                
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;
            case '2-23':
                $output.=forminput('text', 'tentang', 'Tentang');
                $output.=forminput('text', 'membaca', 'Membaca');
                $output.=forminput('text', 'menimbang', 'Menimbang');
                $output.=forminput('text', 'mengingat', 'Mengingat');
                $output.=forminput('text', 'kepada', 'Kepada');
                $output.=forminput('area', 'untuk', 'Untuk');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break; 

            case '2-24':
                $output.=forminput('text', 'tentang', 'Tentang');
                $output.=forminput('text', 'membaca', 'Membaca');
                $output.=forminput('text', 'menimbang', 'Menimbang');
                $output.=forminput('text', 'mengingat', 'Mengingat');
                $output.=forminput('text', 'kepada', 'Kepada');
                $output.=forminput('area', 'untuk', 'Untuk');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break; 

            
        }
        return $output;

    }
    public function isiformskedit($jenissk, $thn, $no, $konsep){
       $output = '';

       $v['tahun'] = $thn;
       $v['nomor'] = $no;
       $v['konsep'] = $konsep;
       $sql="SELECT *
             FROM t_trn_sk
             WHERE nomor ='".$no."'";
       $query = $this->db->query($sql);
       $return = $query->result();
       $surat = $return[0];
       // print_r($surat);
       switch ($jenissk) {
           case '1-10':
               $output.=forminput('text', 'lampiran', 'Lampiran', $surat->lampiran);
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('text', 'ditujukan', 'Ditujukan', $surat->ditujukan);
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);
               $output.=forminput('text', 'kota', 'Kota', $surat->kota);
               $output.=forminput('text', 'kodepos', 'Kode Pos', $surat->kode_pos);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;
           
           case '1-11':
               $output.=forminput('text', 'lampiran', 'Lampiran', $surat->lampiran);
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('text', 'ditujukan', 'Ditujukan', $surat->ditujukan);
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);
               $output.=forminput('text', 'kota', 'Kota', $surat->kota);
               $output.=forminput('text', 'kodepos', 'Kode Pos', $surat->kode_pos);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);         
               break;

           case '1-12':
               $output.=forminput('text', 'lampiran', 'Lampiran', $surat->lampiran);
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('text', 'ditujukan', 'Ditujukan', $surat->ditujukan);
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);
               $output.=forminput('text', 'kota', 'Kota', $surat->kota);
               $output.=forminput('text', 'kodepos', 'Kode Pos', $surat->kode_pos);
               $output.=forminput('calendar', 'tgl_nosurat', 'Tgl No Surat', displaytgl($surat->sp_tgl));
               $output.=forminput('text', 'jumlah', 'Jumlah', $surat->sp_jml);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);           

               break;

           case '1-13':
               $output.=forminput('text', 'lampiran', 'Lampiran', $surat->lampiran);
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('text', 'ditujukan', 'Ditujukan', $surat->ditujukan);
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);
               $output.=forminput('text', 'kota', 'Kota', $surat->kota);
               $output.=forminput('text', 'kodepos', 'Kode Pos', $surat->kode_pos);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);   
               break;

           case '1-14':
               $output.=forminput('area', 'isi', 'Uraian', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', $surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', $surat->tgl_ditetapkan);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);  
               $output.=forminput('text', 'kantor', $surat->kantor_1);
               $output.=forminput('text', 'alamat1', $surat->alamat_1);                                                
               $output.=forminput('text', 'nip1', $surat->NIP);  
               $output.=forminput('text', 'jabatan2', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', $surat->pejabat_ttd1);
               $output.=forminput('text', 'alamat2', $surat->alamat_2);
               $output.=forminput('text', 'nip2', $surat->NIP1);
               break;

           case '1-15':
               $output.=forminput('area', 'isi', 'Uraian', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', $surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', $surat->tgl_ditetapkan);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               $output.=forminput('text', 'mengetahui', $surat->mengetahui);
               break;

           case '1-16':
               $output.=forminput('text', 'tentang', $surat->tentang);
               $output.=forminput('text', 'ditujukan', 'Ditujukan', $surat->ditujukan);
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);
               $output.=forminput('text', 'kota', 'Kota', $surat->kota);
               $output.=forminput('text', 'kodepos', 'Kode Pos', $surat->kode_pos);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1); 
               break;

           case '1-20':
               $output.=forminput('text', 'dari', $surat->dari); 
               $output.=forminput('text', 'ditujukan', 'Ditujukan', $surat->ditujukan);
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);
               $output.=forminput('text', 'kota', 'Kota', $surat->kota);
               $output.=forminput('text', 'kodepos', 'Kode Pos', $surat->kode_pos);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1); 
               break; 

           case '2-12':
               $output.=forminput('text', 'tentang', 'Tentang' ,$surat->tentang); 
               $output.=forminput('text', 'membaca', 'Membaca' ,$surat->membaca); 
               $output.=forminput('text', 'menimbang', 'Menimbang' ,$surat->menimbang); 
               $output.=forminput('text', 'mengingat', 'Mengingat' ,$surat->mengingat); 
               $output.=forminput('text', 'kepada', 'Kepada' ,$surat->kepada); 
               $output.=forminput('area', 'isi', 'Untuk', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', 'Ditetapka di' ,$surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan' ,$surat->tgl_ditetapkan);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', 'an. Pejabat' ,$surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break; 

           case '2-13':
               $output.=forminput('text', 'tentang', 'Tentang' ,$surat->tentang); 
               $output.=forminput('text', 'membaca', 'Membaca' ,$surat->membaca); 
               $output.=forminput('text', 'menimbang', 'Menimbang' ,$surat->menimbang); 
               $output.=forminput('text', 'mengingat', 'Mengingat' ,$surat->mengingat); 
               $output.=forminput('text', 'kepada', 'Kepada' ,$surat->kepada); 
               $output.=forminput('area', 'isi', 'Untuk', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', 'Ditetapka di' ,$surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan' ,$surat->tgl_ditetapkan);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;     

           case '2-14':
               $output.=forminput('text', 'ditujukan', 'Ditujukan', $surat->ditujukan);
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);
               $output.=forminput('text', 'kota', 'Kota', $surat->kota);
               $output.=forminput('text', 'kodepos', 'Kode Pos', $surat->kode_pos);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di' ,$surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan' ,$surat->tgl_ditetapkan);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break; 

           case '2-15':
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di' ,$surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan' ,$surat->tgl_ditetapkan);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;  

          case '2-16':
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di' ,$surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan' ,$surat->tgl_ditetapkan);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;   

          case '2-17':
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di' ,$surat->ditetapkandi);
               $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan' ,$surat->tgl_ditetapkan);
               $output.=forminput('text', 'jabatan1', 'Jabatan Pihak Petama', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan' , $surat->pejabat_ttd);   
               $output.=forminput('text', 'alamat', 'Alamat', $surat->alamat);                                               
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'namaorg', 'Nama Organisasi', $surat->kantor_2);
               $output.=forminput('text', 'alamat2', 'Alamat', $surat->alamat_2);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;        

          case '2-18':
               $output.=forminput('text', 'tentang', 'Tentang', $surat->tentang);
               $output.=forminput('text', 'membaca', 'Pasal 1' , $surat->membaca); 
               $output.=forminput('text', 'ditujukan', 'Pasal 2', $surat->ditujukan);
               $output.=forminput('text', 'menimbang', 'Pasal 3', $surat->menimbang);
               $output.=forminput('text', 'mengingat', 'Pasal 4' , $surat->mengingat);
               $output.=forminput('text', 'memperhatikan', 'Pasal 5' , $surat->memperhatikan);
               $output.=forminput('area', 'isi', 'Pasal 7', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;  

          case '2-19':
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break; 

          case '2-20':
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;

          case '2-21':
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;  

          case '2-22':
               $output.=forminput('text', 'tentang', 'Hal', $surat->tentang);
               $output.=forminput('area', 'isi', 'Isi', $surat->isi_suratkeluar);
               $output.=forminput('text', 'anpejabat', 'an. Pejabat', $surat->an_pejabat);
               $output.=forminput('text', 'jabatan1', 'Jabatan', $surat->jabatan_ttd);
               $output.=forminput('text', 'namattd1', 'Nama Penandatangan', $surat->pejabat_ttd);                                
               $output.=forminput('text', 'nip1', 'NIP', $surat->NIP);
               $output.=forminput('text', 'jabatan2', 'Jabatan', $surat->jabatan_ttd1);
               $output.=forminput('text', 'namattd2', 'Nama Penandatangan', $surat->pejabat_ttd1);
               $output.=forminput('text', 'nip2', 'NIP', $surat->NIP1);
               break;
            
            case '2-23':
                $output.=forminput('text', 'tentang', 'Tentang');
                $output.=forminput('text', 'membaca', 'Membaca');
                $output.=forminput('text', 'menimbang', 'Menimbang');
                $output.=forminput('text', 'mengingat', 'Mengingat');
                $output.=forminput('text', 'kepada', 'Kepada');
                $output.=forminput('area', 'untuk', 'Untuk');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break; 

            case '2-24':
                $output.=forminput('text', 'tentang', 'Tentang');
                $output.=forminput('text', 'membaca', 'Membaca');
                $output.=forminput('text', 'menimbang', 'Menimbang');
                $output.=forminput('text', 'mengingat', 'Mengingat');
                $output.=forminput('text', 'kepada', 'Kepada');
                $output.=forminput('area', 'untuk', 'Untuk');
                $output.=forminput('text', 'ditetapkandi', 'Ditetapkan di');
                $output.=forminput('calendar', 'tglditetapkan', 'Tgl Ditetapkan');
                $output.=forminput('text', 'anpejabat', 'an. Pejabat');
                $output.=forminput('text', 'jabatan1', 'Jabatan');
                $output.=forminput('text', 'namattd1', 'Nama Penandatangan');                                              
                $output.=forminput('text', 'nip1', 'NIP');
                $output.=forminput('text', 'jabatan2', 'Jabatan');
                $output.=forminput('text', 'namattd2', 'Nama Penandatangan');
                $output.=forminput('text', 'nip2', 'NIP');
                break;                                                                                                                                                                                                        
       }
       return $output;

    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */