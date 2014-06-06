<?php
class User_model extends CI_Model {
    var $userid      = '';
    var $pwd        = '';
    var $kd_level          = '';
    var $unitorg    = '';

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
    public function create_user($data)
    {
        $this->userid       = $data['userid'];
        $this->pwd          = $data['pwd'];
        $this->kd_level     = $data['kd_level'];
        $this->unitorg      = $data['unitorg'];

        if($this->db->insert('t_userid', $this)){
            return "success";
        }
        else{
            return "fail";
        }
    }
    public function edit_user($data)
    {
        $sqlupdate ="UPDATE t_userid
                SET pwd='".$data['pwd']."',
                kd_level='".$data['kd_level']."',
                unitorg='".$data['unitorg']."'
                WHERE userid = '".$data['userid']."'";
        $result=$this->db->query($sqlupdate);
        if($result){
            return "success";
        }
        else{
            return "fail";
        }
    }

    /*
        created by  : Ronald Tampubolon
        date        : 12/09/2013
        comment     : SELECT tbl_user_master and put into SESSION
    */
    public function signin_user($data)
    {
        // cek apakah data kosong??
        $sql = "SELECT a.*, b.uraian_unit, b.uraian 
                FROM t_userid a, t_par_unitorg b
                WHERE a.unitorg = b.kd_unitorg AND lower(a.userid)= lower('".$data['username']."') AND a.pwd='".$data['password']."'";
        $query=$this->db->query($sql);

        if ($query->num_rows==0){
            return "wrong";
            exit;
        }
        // jika data ada
        else{
            foreach ($query->result() as $row)
            {
                //generate authkey untuk user login
                $sData = array(
                        'FilePath'   => "dokumen/",
                        'UserName'     => $row->userid,
                        'Level'   => $row->kd_level,
                        'UnitOrg'       => $row->unitorg,
                        'UnitOrg1'     => $row->uraian_unit,
                        'Biro'     => $row->uraian
                );
            }
            $this->session->set_userdata($sData);
            return "success";
            exit;
        }
    }

  
    public function change_password($password, $id){

            $data = array(
               'pwd' => $password
            );

            $this->db->where(array('userid' => $id));
            $result=$this->db->update('t_userid', $data);
            return $result;
    }
    /*
        created : 10/09/2013 10:15
        by : ronald tampubolon
        description : Menggambil semua data user non admin dengan histori aplikasinya
    */
    public function listall()
    {
        $sql="SELECT a.*,b.kd_unitorg,b.uraian_unit,c.kd_level,c.uraian_level
              FROM t_userid a, t_par_unitorg b, t_par_leveluser c
              WHERE b.kd_unitorg = a.unitorg and  a.kd_level = c.kd_level ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    /*
        created : 10/09/2013 10:15
        by : ronald tampubolon
        description : Menggambil data non user dengan histori aplikasinya
    */
    public function getonedata($id)
    {
        $sql="SELECT *
              FROM t_userid
              WHERE userid = '".$id."'";
        $query = $this->db->query($sql);
        $return = $query->result();
        if(!empty($return[0]))
            return $return[0];
        else
            return array();
    }
}