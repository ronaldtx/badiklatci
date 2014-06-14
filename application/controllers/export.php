<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {

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
        $this->load->model('konsep_model');
        $this->load->model('suratmasuk_model');
        $this->load->model('suratkeluar_model');
        $this->load->model('skkonsep_model');
    }
    public function index()
    {
       exit("no access");
    }
    public function ekonsep(){
        if(!empty($_GET)){
            $data['cari'] = $_GET['cari'];
            $data['tgl1'] = $_GET['tgl1'];
            $data['tgl2'] = $_GET['tgl2'];
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
            $data['cari'] = '';
            $data['tgl1'] = '';
            $data['tgl2'] = '';
            $cond ="";
        }
        $listsurat = $this->konsep_model->listallexport($cond);
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Konsep Surat Keluar');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()
            ->setCellValue('A1', 'Nomor')
            ->setCellValue('B1', 'tahun')
            ->setCellValue('C1', 'No. Konsep')
            ->setCellValue('D1', 'Tgl. Konsep')
            ->setCellValue('E1', 'No. Terkait')
            ->setCellValue('F1', 'Konseptor')
            ->setCellValue('G1', 'Kepada')
            ->setCellValue('H1', 'Sifat');

        $i=2;

        foreach ($listsurat as $v) {
           $this->excel->getActiveSheet()
            ->setCellValue('A'.$i, $v->nomor)
            ->setCellValue('B'.$i, $v->tahun)
            ->setCellValue('C'.$i, $v->no_konsep_sk)
            ->setCellValue('D'.$i, displaytgl($v->$v->tgl_konsep_sk))
            ->setCellValue('E'.$i, $v->no_terkait)
            ->setCellValue('F'.$i, $v->konseptor)
            ->setCellValue('G'.$i, $v->ditujukan)
            ->setCellValue('H'.$i, $v->uraian);
            $i++;
        }
        
        $filename='listkonsepsuratkeluar'.date("Ymdhis").'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
                     
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        
    }
    public function esuratmasuk(){
        if(!empty($_GET)){
            $data['jenissm'] = $_GET['jenissm'];
            $data['cari'] = $_GET['cari'];
            $data['tgl1'] = $_GET['tgl1'];
            $data['tgl2'] = $_GET['tgl2'];
            $pencarian = " AND (no_agenda LIKE '%".$data['cari']."%'";
            $pencarian .= " OR no_surat LIKE '%".$data['cari']."%'";
            $pencarian .= " OR instansi_asal LIKE '%".$data['cari']."%'";
            $pencarian .= " OR perihal LIKE '%".$data['cari']."%'";
            $pencarian .= " OR ditujukan LIKE '%".$data['cari']."%'";
            $pencarian .= " OR disposisi LIKE '%".$data['cari']."%')";

            if(strlen($data['jenissm'])>0)
                $pencarian .=" AND kd_jenis_sm = '".$data['jenissm']."'";

            if(mysqltgl($data['tgl1'])!="--" || mysqltgl($data['tgl2'])!="--")
                $cond = "AND tgl_surat BETWEEN '".mysqltgl($data['tgl1'])."' AND '".mysqltgl($data['tgl2'])."'";
            else
                $cond ="";$cond .=$pencarian;
        } 
        else{
            $cond ="";
        }
        $listsurat = $this->suratmasuk_model->listallexport($cond);
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Surat Masuk');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()
            ->setCellValue('A1', 'No. Agenda')
            ->setCellValue('B1', 'Tgl. Agenda')
            ->setCellValue('C1', 'No. Surat')
            ->setCellValue('D1', 'Tgl. Surat')
            ->setCellValue('E1', 'Asal Surat')
            ->setCellValue('F1', 'Perihal')
            ->setCellValue('G1', 'Kepada')
            ->setCellValue('H1', 'Disposisi')
            ->setCellValue('I1', 'Selama');

        $i=2;
        foreach ($listsurat as $v) {
           $this->excel->getActiveSheet()
            ->setCellValue('A'.$i, $v->no_agenda)
            ->setCellValue('B'.$i, displaytgl($v->tgl_agenda))
            ->setCellValue('C'.$i, $v->no_surat)
            ->setCellValue('D'.$i, displaytgl($v->tgl_surat))
            ->setCellValue('E'.$i, $v->instansi_asal)
            ->setCellValue('F'.$i, $v->perihal)
            ->setCellValue('G'.$i, $v->ditujukan)
            ->setCellValue('H'.$i, $v->disposisi)
            ->setCellValue('I'.$i, $v->batas_selesai_disp." Hari");
            $i++;
        }
        

        $filename='listsuratmasuk'.date("Ymdhis").'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
                     
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        
    }
    public function esuratkeluar(){
        if(!empty($_GET)){
            $data['cari'] = $_GET['cari'];
            $data['jenissk'] = $_GET['jenissk'];
            $data['tgl1'] = $_GET['tgl1'];
            $data['tgl2'] = $_GET['tgl2'];
            $pencarian = " AND (no_terkait LIKE '%".$data['cari']."%'";
            $pencarian .= " OR no_surat_keluar LIKE '%".$data['cari']."%'";
            $pencarian .= " OR konseptor LIKE '%".$data['cari']."%'";
            $pencarian .= " OR no_kirim LIKE '%".$data['cari']."%'";
            $pencarian .= " OR nomor LIKE '%".$data['cari']."%'";
            $pencarian .= " OR ditujukan LIKE '%".$data['cari']."%')";
            if(strlen($data['jenissk'])>0){
                $pecahan = strtok($data['jenissk'],"-");
                $kd_sd = $pecahan;
                $pecahan=strtok("-");
                $kd_sk = $pecahan;
                $pecahan=strtok("-");

                $pencarian .= " AND kd_jenis_sd ='".$kd_sd."' AND kd_jenis_sk = '".$kd_sk."'";
            }

            if(mysqltgl($data['tgl1'])!="--" || mysqltgl($data['tgl2'])!="--")
                $cond = "AND tgl_surat_keluar BETWEEN '".mysqltgl($data['tgl1'])."' AND '".mysqltgl($data['tgl2'])."'";
            else
                $cond ="";
            $cond .=$pencarian;
        } 
        else{
            $cond ="";
        }
        $listsurat = $this->suratkeluar_model->listallexport($cond);
        $this->load->library('excel');
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Surat Masuk');
        //set cell A1 content with some text
        $this->excel->getActiveSheet()
            ->setCellValue('A1', 'Nomor')
            ->setCellValue('B1', 'Tahun')
            ->setCellValue('C1', 'No. Surat')
            ->setCellValue('D1', 'Tgl. Surat')
            ->setCellValue('E1', 'No. Terkait')
            ->setCellValue('F1', 'Konseptor')
            ->setCellValue('G1', 'Kepada')
            ->setCellValue('H1', 'No. Kirim')
            ->setCellValue('I1', 'Tgl. Kirim');

        $i=2;
        foreach ($listsurat as $v) {
           $this->excel->getActiveSheet()
            ->setCellValue('A'.$i, $v->nomor)
            ->setCellValue('B'.$i, $v->tahun)
            ->setCellValue('C'.$i, $v->no_surat_keluar)
            ->setCellValue('D'.$i, displaytgl($v->tgl_surat_keluar))
            ->setCellValue('E'.$i, $v->no_terkait)
            ->setCellValue('F'.$i, $v->konseptor)
            ->setCellValue('G'.$i, $v->ditujukan)
            ->setCellValue('H'.$i, $v->no_kirim)
            ->setCellValue('I'.$i, displaytgl($v->tgl_kirim));
            $i++;
        }
        

        $filename='listsuratkeluar'.date("Ymdhis").'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
                     
        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */