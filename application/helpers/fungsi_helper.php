<?php 
function maxKode($tbl, $fl='id', $cond='', $b=1, $c=4){
    $CI =& get_instance();
    $CI->load->database();

    $sql= "SELECT IFNULL(max(cast(substring(".$fl.", ".$b.", ".$c.") as UNSIGNED)),0)+1 as idmax 
            FROM ".$tbl." ".$cond;

    $q = $CI->db->query($sql);
    foreach ($q->result() as $r)
    {
        $max=$r->idmax;         
    }
    
    return str_pad($max,4, '0', STR_PAD_LEFT);
}
function maxKode2($tbl, $fl='id', $cond='', $b=1, $c=4){
    $CI =& get_instance();
    $CI->load->database();

    $sql= "SELECT IFNULL(max(cast(substring(".$fl.", ".$b.", ".$c.") as UNSIGNED)),0)+1 as idmax 
            FROM ".$tbl." ".$cond;

    $q = $CI->db->query($sql);
    foreach ($q->result() as $r)
    {
        $max=$r->idmax;         
    }
    
    return str_pad($max,5, '0', STR_PAD_LEFT);
}
function maxSerial($tbl, $field){
    $CI =& get_instance();
    $CI->load->database();

    $sql= "SELECT IFNULL(max(".$field."),0)+1 as idmax
            FROM ".$tbl;

    $q = $CI->db->query($sql);
    foreach ($q->result() as $r)
    {
        $max=$r->idmax;         
    }
    
    return $max;
}
function listall($table, $cond=""){
    $CI =& get_instance();
    $CI->load->database();

    $sql="SELECT *
              FROM ".$table. " ". $cond;
    $query = $CI->db->query($sql);
    
    return $query->result();
}
function getKodeTipe($kode){
    $CI =& get_instance();
    $CI->load->database();

    $sql= "SELECT * FROM tbl_master_barang_tipe WHERE kode_tipe='".$kode."' AND status=1";

    #echo $sql1;
    $q = $CI->db->query($sql);
    foreach ($q->result() as $r)
    {
        $kd=$r->kode_user;
    }
    
    return $kd;
}
function getKodeDiv($kode){
    $CI =& get_instance();
    $CI->load->database();

    $sql= "SELECT b.* FROM 
            tbl_user_master a, tbl_master_divisi b 
            WHERE a.kode_divisi=b.kode_divisi AND a.kode_user='".$kode."' AND status=1";

    #echo $sql1;
    $q = $CI->db->query($sql);
    foreach ($q->result() as $r)
    {
        $kd=$r->kode_user;
    }
    
    return $kd;
}
function maxID($tbl, $fl='id'){
    $CI =& get_instance();
    $CI->load->database();

    $sql= "SELECT coalesce(max(".$fl."),0)+1 as idmax FROM ".$tbl;

    #echo $sql1;
    $q = $CI->db->query($sql);
    foreach ($q->result() as $r)
    {
        $max=$r->idmax;         
    }
    
    return $max;
}
function forminput($type, $name, $label, $nilai="", $tambah="", $modal="", $txt=""){
    switch ($type) {
        case 'text':
            $input = '<input type="text" id="'.$name.'" value="'.$nilai.'" name="'.$name.'" placeholder="'.$label.'" '.$tambah.' />';
            break;
        case 'password':
            $input = '<input type="password" id="'.$name.'" value="'.$nilai.'" name="'.$name.'" placeholder="'.$label.'" '.$tambah.' />';
            break;
        case 'textpop':
            $input = '<input type="text" id="'.$name.'" value="'.$nilai.'" name="'.$name.'" placeholder="'.$label.'" '.$tambah.' />
                      <a data-toggle="modal" href="#'.$modal.'">
                        <span class="add-on">
                            <i class="icon-search"></i>
                        </span>
                       </a>';
            break;
        case 'textadd':
            $input = '<input type="text" id="'.$name.'" value="'.$nilai.'" name="'.$name.'" placeholder="'.$label.'" '.$tambah.' />
                      <span class="add-on">
                            '.$txt.'
                      </span>';
            break;
        case 'file':
            $input = '<input type="file" id="'.$name.'" value="" name="'.$name.'" placeholder="'.$label.'" '.$tambah.' />';
            break;
        case 'calendar':
            $input = '<input class="date-picker" value="'.$nilai.'" id="'.$name.'" name="'.$name.'" type="text" data-date-format="dd-mm-yyyy" />
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>';
                $jsnya = '<script type="text/javascript">
                $(function() {
                    $(".date-picker").datepicker().next().on(ace.click_event, function(){
                      $(this).prev().focus();
                    });
                })
                </script>';
                $input.=$jsnya;
            break;
        case 'area':
            $input = '<textarea id="'.$name.'" name="'.$name.'" placeholder="'.$label.'" '.$tambah.'>'.$nilai.'</textarea>';
            break;
        default:
            # code...
            break;
    }
    $output = '<div class="control-group">
        <label class="control-label" for="'.$name.'">'.$label.'</label>
        <div class="controls">
            '.$input.'
        </div>
    </div>';
    return $output;
}
function sendemail($email, $user, $barang){
    
    $to = $email;
    $from = "no-reply@appkontras.com";
    $subject = "Notifikasi Pemesanan Urgent Barang";
    $message = 'Dear Admin, <br>
    User '.$user.' membutuhkan '.$barang.' status <b>URGENT</b>';

    // load the email library that provided by CI
    $CI =& get_instance();
    $CI->load->library('email');
    // this will bind your attributes to email library
    $CI->email->set_newline("\r\n");
    $CI->email->from($from, FROMEMAIL);
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    // echo $CI->email->print_debugger();
    // send your email. if it produce an error it will print 'Fail to send your message!' for you
    if($CI->email->send()) {
        return "success";
    }
    else {
        return "failed";
    }

}
function mysqltgl($tgl){
    $t = explode("-", $tgl);
    $output = $t[2]."-".$t[1]."-".$t[0];
    return $output;
}
function displaytgl($tgl){
    $x = explode(" ", $tgl);
    $t = explode("-", $x[0]);
    $output = $t[2]."-".$t[1]."-".$t[0];
    if($output=='00-00-0000')
        return "";
    else
        return $output;
}
function pagemax($page){

    $output = ceil($page/LIMITPAGING);
    // exit($output."");
    return $output;

}
function paging($page){
    // pagemax($page);
    $offset = LIMITPAGING * ($page-1) ;
    return $offset;

}
?>