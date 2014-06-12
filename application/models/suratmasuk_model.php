<?php
class Suratmasuk_model extends CI_Model {
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
            $filename = $newFileName;

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
        $id = maxSerial('t_trn_sm', 'id');
        $sql ="insert into t_trn_sm (id, tahun, kd_jenis_sm, lampiran, kd_sifat_sm, no_agenda,tgl_agenda,kd_unitorg, 
              no_agendatu,tgl_agendatu,no_surat,tgl_surat,perihal,
        instansi_asal,ditujukan,diteruskan,disposisi,batas_selesai_disp, 
            keterangan,file_dokumen,kd_status_sm,tgl_posting,kd_sumber,no_terkait, user_posting ) 
              VALUES (".$id.", '".date("Y")."','".$data['jenissm']."', '".$data['lampiran']."', '".$data['sifatsm']."','".$data['agenda_left'].trim($data['agenda_right'])."',
              '".mysqltgl($data['tglagenda'])."','".$this->session->userdata('UnitOrg')."', 
              '".$data['agenda_left'].trim($data['agenda_right'])."',
              '".mysqltgl($data['tglagenda'])."','".$data['nosurat']."','".mysqltgl($data['tglsurat'])."',
              '".$data['perihal']."', '".$data['asalsurat']."','".$data['ditujukan']."',
              '".$data['diteruskan']."','".$data['disposisi']."','".$data['batasdisposisi']."',
              '".$data['keterangan']."','".$filename."','".$data['statussm']."',NOW(),'01','".$data['noterkait']."', '".$this->session->userdata('UserName')."' )";
        // $result=$this->db->query($sql);
        if($this->db->query($sql)){
            return "success";
        }
        else{
            return "fail";
        }
    }
    public function posting($data)
    {   
        $sqlv="SELECT *
          FROM t_trn_sm
          WHERE parent =".$data['idsm'] ." AND
                kd_unitorg ='".$data['postingsm']."'";
        $query = $this->db->query($sqlv);

        if($query->num_rows()==0){
            $sqlv="SELECT *
                    FROM t_trn_sm
                    WHERE id =".$data['idsm'];

            $query = $this->db->query($sqlv);
            $return = $query->result();
            $x = $return[0];
            $id = maxSerial('t_trn_sm', 'id');
            $sql ="insert into t_trn_sm (id, parent, tahun,kd_jenis_sm, lampiran, kd_sifat_sm,no_agenda,tgl_agenda,kd_unitorg, 
                  no_agendatu,tgl_agendatu,no_surat,tgl_surat,perihal,
            instansi_asal,ditujukan,diteruskan,disposisi,batas_selesai_disp, 
                keterangan,file_dokumen,kd_status_sm,tgl_posting,kd_sumber,no_terkait, user_posting ) 
                  VALUES (".$id.", ".$data['idsm'].", '".$x->tahun."','".$x->kd_jenis_sm."','".$x->lampiran."',
                  '".$x->kd_sifat_sm."','".$x->no_agenda."', '".$x->tgl_agenda."',
                  '".$data['postingsm']."', '".$x->no_agendatu."',
                  '".$x->tgl_agendatu."','".$x->no_surat."','".$x->tgl_surat."',
                  '".$x->perihal."', '".$x->instansi_asal."','".$x->ditujukan."',
                  '".$x->diteruskan."','".$data['disposisi']."','".$x->batas_selesai_disp."',
                  '".$x->keterangan."','".$x->file_dokumen."','".$x->kd_status_sm."',NOW(),'02','".$x->no_terkait."', '".$this->session->userdata('UserName')."' )";

            if($this->db->query($sql)){
                $sqlUpdate = "UPDATE t_trn_sm
                        SET kd_status_sm='02'
                        WHERE tahun ='".$data['vtahun']."' AND
                        kd_jenis_sm ='".$data['vjenissm']."' AND
                        no_agenda ='".$data['vagenda']."' AND
                        no_surat ='".$data['vsurat']."'";
                $this->db->query($sqlUpdate);

                if(isset($data['aksi'])){

                    foreach ($data['aksi'] as $a) {
                        $sqldet="INSERT INTO t_trn_sm_detail(idsm, kd_aksi)
                                VALUE(".$id.", '".$a."');";
                        $this->db->query($sqldet);
                    }
                }

                return "success";
            }
            else{
                return "fail";
            }
        }
        return "already";
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
                        kd_sifat_sm = '".$data['sifatsm']."',
                        perihal='".$data['perihal']."',
                        instansi_asal='".$data['asalsurat']."',
                        ditujukan='".$data['ditujukan']."',
                        lampiran='".$data['lampiran']."',
                        diteruskan='".$data['diteruskan']."',
                        disposisi='".$data['disposisi']."',
                        batas_selesai_disp='".$data['batasdisposisi']."',
                        keterangan='".$data['keterangan']."',
                        file_dokumen='".$filename."',
                        no_terkait='".$data['noterkait']."',
                        user_posting = '".$this->session->userdata('UserName')."',
                        tgl_posting = NOW(),
                        status='1'
             WHERE id=".$data['idsm']."";
        if($this->db->query($sqlupdate)){
            return "success";
        }
        else{
            return "fail";
        }
    }
    public function hapusposting($id, $parent){
        $sqlc1 = "SELECT * FROM t_trn_sm WHERE id = ".$id;
        $queryc1 = $this->db->query($sqlc1);
        foreach($queryc1->result() as $x){
            $noagenda = $x->no_agenda;
            $tahun = $x->tahun;
        }


        $sql = "DELETE FROM t_trn_sm WHERE id =".$id;
        if($this->db->query($sql)){
            $sqld = "DELETE FROM t_trn_sm_detail WHERE idsm =".$id;
            $this->db->query($sqld);
            
            $sqlc2 = "SELECT * FROM t_trn_sm WHERE no_agenda = '".$noagenda."'";
            $queryc2 = $this->db->query($sqlc2);
            if($queryc2->num_rows()==1){
                $sqlU = "UPDATE t_trn_sm
                        SET kd_status_sm='01'
                        WHERE no_agenda = '".$noagenda."' AND tahun = '".$tahun."'";
                $this->db->query($sqlU);

            }
            return "success";
        }
        else{
            return "error";
        }

    }
    public function listall($cond, $a=0, $b=LIMITPAGING)
    {
        $sql = "SELECT *, (SELECT count(*) FROM t_trn_sm
                WHERE kd_unitorg='".$this->session->userdata('UnitOrg')."'
                ".$cond.") jmldata
                FROM t_trn_sm 
                WHERE kd_unitorg='".$this->session->userdata('UnitOrg')."'
                ".$cond."
                ORDER BY tgl_posting DESC";
        if($a!=0)
            $sql.=" LIMIT ".paging($a).", ".$b;
        // exit($sql);
        $query = $this->db->query($sql);
        return $query->result();
    }
    public function listallexport($cond)
    {
        $sql = "SELECT * 
                FROM t_trn_sm 
                WHERE kd_unitorg='".$this->session->userdata('UnitOrg')."'
                ".$cond."
                ORDER BY tgl_posting DESC";
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
              FROM t_trn_sm
              WHERE id =".$d['id'];
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
              WHERE a.kd_unitorg=b.kd_unitorg AND a.parent =".$d['id'];

        $query = $this->db->query($sql);
        $return = $query->result();
        if(!empty($return))
            return $return;
        else
            return array();
    }
}