<?php
class Skkonsep_model extends CI_Model {
    var $kode_kondisi = '';
    var $nama_kondisi = '';
    var $status_active  = 1;

    public function __construct()
    {
        // Call the Model constructor
        $this->load->database();
        parent::__construct();
        $this->load->library('session');
    }
    /*
        created by  : Ronald Tampubolon
        date        : 12/09/2014
        comment     : INSERT INTO tbl_user_master
    */
    public function create($data)
    {   
        if(!empty($_FILES['lokasifile']['name'])){
            $config['upload_path'] = UPLOADPATH;
            $newFileName = $_FILES['lokasifile']['name'];
            $fileExt = array_pop(explode(".", $newFileName));
            $filename = md5(date("U")).".".$fileExt;

            $config['file_name'] = $filename;
            $config['allowed_types'] = '*';
            $config['max_size'] = '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('lokasifile'))
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                echo "error";
                exit;
                // redirect(base_url()."user/create");
            }
        }

        $pecahan = strtok($data['jenissk'],"-");
        $kd_sd = $pecahan;
        $pecahan=strtok("-");
        $kd_sk = $pecahan;
        $pecahan=strtok("-");

        $sql ="insert into t_trn_sk 
                (nomor , tahun , no_unitorg , kd_jenis_sd , 
                  kd_jenis_sk , no_konsep_sk , tgl_konsep_sk , 
                  no_terkait,konseptor,no_surat_keluar , 
                  tgl_surat_keluar , sifat_sk , ditujukan , 
                  alamat , kota , kode_pos , tentang ,
                  membaca,menimbang,mengingat,memperhatikan,
                  isi_suratkeluar , ditetapkan_di , tgl_ditetapkan ,
                  an_pejabat, jabatan_ttd,pejabat_ttd,NIP,jabatan_ttd1,
                  pejabat_ttd1,NIP1, tembusan ,keterangan ,lampiran,
                  status_sk , no_kirim , tgl_kirim , file_dokumen, 
                  sp_tgl, sp_jml, dari, kantor_1, alamat_1, kantor_2, 
                  alamat_2, mengetahui, kepada, flag_sk)
             VALUES ('".maxSerial('t_trn_sk', 'nomor')."',
                     '".date("Y")."',
                     '".$this->session->userdata('UnitOrg')."',
                     '".$kd_sd."',
                     '".$kd_sk."',
                     '".$data['nokonsep']."',
                     '".mysqltgl($data['tglkonsep'])."',
                     '".$data['noterkait']."',
                     '".$data['konseptor']."',
                     '".$data['nosurat_left'].trim($data['nosurat_right'])."',
                     '".mysqltgl($data['tglsuratkeluar'])."',
                     '".$data['sifatsk']."', 
                     '".$data['ditujukan']."',
                     '".$data['alamat']."',
                     '".$data['kota']."',
                     '".$data['kodepos']."',
                     '".$data['tentang']."',
                     '".$data['membaca']."',
                     '".$data['menimbang']."',
                     '".$data['mengingat']."',
                     '".$data['memperhatikan']."',
                     '".$data['isi']."',
                     '".$data['ditetapkandi']."',
                     '".mysqltgl($data['tglditetapkan'])."',
                     '".$data['anpejabat']."',
                     '".$data['jabatan1']."',
                     '".$data['namattd1']."',
                     '".$data['nip1']."',
                     '".$data['jabatan2']."',
                     '".$data['namattd2']."',
                     '".$data['nip2']."',
                     '".$data['tembusan']."',
                     '".$data['keterangan']."',
                     '".$data['lampiran']."',
                     '01',
                     '".$data['fromemail']."',
                     '".mysqltgl($data['tglkirim'])."',
                     '".$filename."',
                     '".$data['tgl_nosurat']."',
                     '".$data['jumlah']."',
                     '".$data['dari']."',
                     '".$data['kantor']."',
                     '".$data['alamat1']."',
                     '".$data['namaorg']."',
                     '".$data['alamat2']."',
                     '".$data['mengetahui']."',
                     '".$data['kepada']."',1)";
        // $result=$this->db->query($sql);
        if($this->db->query($sql)){
            return "success";
        }
        else{
            return "fail";
        }
    }
    public function createsk($data)
    {   
        
        $pecahan = strtok($data['vjenissk'],"-");
        $kd_sd = $pecahan;
        $pecahan=strtok("-");
        $kd_sk = $pecahan;
        $pecahan=strtok("-");
        $filename = $data['vlokasifile'];
        $sql ="insert into t_trn_sk 
                (nomor , tahun , no_unitorg , kd_jenis_sd , 
                  kd_jenis_sk , no_konsep_sk , tgl_konsep_sk , 
                  no_terkait,konseptor,no_surat_keluar , 
                  tgl_surat_keluar , sifat_sk , ditujukan , 
                  alamat , kota , kode_pos , tentang ,
                  membaca,menimbang,mengingat,memperhatikan,
                  isi_suratkeluar , ditetapkan_di , tgl_ditetapkan ,
                  an_pejabat, jabatan_ttd,pejabat_ttd,NIP,jabatan_ttd1,
                  pejabat_ttd1,NIP1, tembusan ,keterangan ,lampiran,
                  status_sk , no_kirim , tgl_kirim , file_dokumen, 
                  sp_tgl, sp_jml, dari, kantor_1, alamat_1, kantor_2, 
                  alamat_2, mengetahui, kepada, flag_sk, nomor_parent, tgl_posting, user_posting)
             VALUES ('".maxSerial('t_trn_sk', 'nomor')."',
                     '".date("Y")."',
                     '".$this->session->userdata('UnitOrg')."',
                     '".$kd_sd."',
                     '".$kd_sk."',
                     '".$data['nokonsep']."',
                     '".mysqltgl($data['tglkonsep'])."',
                     '".$data['noterkait']."',
                     '".$data['konseptor']."',
                     '".$data['nosurat_left'].trim($data['nosurat_right'])."',
                     '".mysqltgl($data['tglsuratkeluar'])."',
                     '".$data['sifatsk']."', 
                     '".$data['ditujukan']."',
                     '".$data['alamat']."',
                     '".$data['kota']."',
                     '".$data['kodepos']."',
                     '".$data['tentang']."',
                     '".$data['membaca']."',
                     '".$data['menimbang']."',
                     '".$data['mengingat']."',
                     '".$data['memperhatikan']."',
                     '".$data['isi']."',
                     '".$data['ditetapkandi']."',
                     '".mysqltgl($data['tglditetapkan'])."',
                     '".$data['anpejabat']."',
                     '".$data['jabatan1']."',
                     '".$data['namattd1']."',
                     '".$data['nip1']."',
                     '".$data['jabatan2']."',
                     '".$data['namattd2']."',
                     '".$data['nip2']."',
                     '".$data['tembusan']."',
                     '".$data['keterangan']."',
                     '".$data['lampiran']."',
                     '01',
                     '".$data['fromemail']."',
                     '".mysqltgl($data['tglkirim'])."',
                     '".$filename."',
                     '".$data['tgl_nosurat']."',
                     '".$data['jumlah']."',
                     '".$data['dari']."',
                     '".$data['kantor']."',
                     '".$data['alamat1']."',
                     '".$data['namaorg']."',
                     '".$data['alamat2']."',
                     '".$data['mengetahui']."',
                     '".$data['kepada']."', 3, ".$data['vnomor'].", 
                     NOW(), 
                     '".$this->session->userdata('UserName')."')";
        // $result=$this->db->query($sql);
        if($this->db->query($sql)){
            return "success";
        }
        else{
            return "fail";
        }
    }
    public function setujui($data){
        $sqlupdate = "UPDATE t_trn_sk SET 
                        flag_sk='2'
             WHERE nomor='".$data['vnomor']."'";
        if($this->db->query($sqlupdate)){
            return "success";
        }
        else{
            return "fail";
        }
    }
    public function edit($data)
    {
        if(!empty($_FILES['lokasifile']['name'])){
            $config['upload_path'] = UPLOADPATH;
            $newFileName = $_FILES['lokasifile']['name'];
            $fileExt = array_pop(explode(".", $newFileName));
            $filename = md5(date("U")).".".$fileExt;

            $config['file_name'] = $filename;
            $config['allowed_types'] = '*';
            $config['max_size'] = '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('lokasifile'))
            {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                echo "error";
                exit;
                // redirect(base_url()."user/create");
            }
        }
        else{
            $filename = $data['vlokasifile'];
        }
        $sqlupdate = "UPDATE t_trn_sm SET 
                        tgl_agenda='".mysqltgl($data['tglagenda'])."',
                        tgl_agendatu='".mysqltgl($data['tglagenda'])."',
                        tgl_surat='".mysqltgl($data['tglsurat'])."',
                        perihal='".$data['perihal']."',
                        instansi_asal='".$data['asalsurat']."',
                        ditujukan='".$data['ditujukan']."',
                        diteruskan='".$data['diteruskan']."',
                        disposisi='".$data['disposisi']."',
                        batas_selesai_disp='".$data['batasdisposisi']."',
                        keterangan='".$data['keterangan']."',
                        file_dokumen='".$filename."',
                        no_terkait='".$data['noterkait']."',
                        status='1',
                        tgl_posting = NOW(),
                        user_posting = '".$this->session->userdata('UserName')."'
             WHERE tahun='".$data['vtahun']."' AND 
                    kd_jenis_sm='".$data['vjenissm']."' AND 
                    no_agenda='".$data['vagenda']."' AND 
                    kd_unitorg='".$data['vunit']."' AND 
                    no_surat='".$data['vsurat']."' ";
        if($this->db->query($sqlupdate)){
            return "success";
        }
        else{
            return "fail";
        }
    }

    public function listall($cond, $a=0, $b=LIMITPAGING)
    {
        $sql = "SELECT * , (SELECT count(*) FROM t_trn_sk 
                WHERE no_unitorg='".$this->session->userdata('UnitOrg')."' AND flag_sk = 2
                ".$cond.") jmldata
                FROM t_trn_sk 
                WHERE no_unitorg='".$this->session->userdata('UnitOrg')."' AND flag_sk = 2
                ".$cond."
                ORDER BY nomor DESC
                LIMIT ".paging($a).", ".$b;
        $query = $this->db->query($sql);
        return $query->result();
    }
    /*
        created : 10/09/2013 10:15
        by : ronald tampubolon
        description : Menggambil data non user dengan histori aplikasinya
    */
    public function getonedata($d)
    {
        $sql="SELECT *
              FROM t_trn_sk
              WHERE tahun ='".$d['tahun']."' AND
                    nomor ='".$d['nomor']."'";
        $query = $this->db->query($sql);
        $return = $query->result();
        if(!empty($return[0]))
            return $return[0];
        else
            return array();
    }
    public function getdataposting($d)
    {
        $sql="SELECT a.*, b.uraian_unit
              FROM t_trn_sm a, t_par_unitorg b
              WHERE tahun ='".$d['tahun']."' AND
                    no_agenda ='".$d['agenda']."' AND
                    no_surat ='".$d['surat']."' AND
                    kd_jenis_sm ='".$d['jenis']."' AND
                    kd_sumber ='02' AND a.kd_unitorg = b.kd_unitorg";

        $query = $this->db->query($sql);
        $return = $query->result();
        if(!empty($return))
            return $return;
        else
            return array();
    }
}