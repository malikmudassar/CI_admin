# mPDF Library using Codeigniter

# Helping Content

You can find full step by step implementaion on http://phpclicks.com/mpdf-library-using-codeigniter/ 

Place the mpdf library in thirdparty directory and Create the mpdf.php file to create a wrapper class for codeigniter by placing following code and put that file into Codeigniter application/library directory.

if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'/third_party/mpdf/mpdf.php';

class M_pdf {

    public $param;
    public $pdf;
    public function __construct($param = "'c', 'A4-L'")
    {
        $this->param =$param;
        $this->pdf = new mPDF($this->param);
    }
}


In your controller you can use below code by placing your own pdf data.Uploads directoy is your root directory you can update your own path.

$filename = time()."_order.pdf";

$html = $this->load->view('unpaid_voucher',$data,true); 

// unpaid_voucher is unpaid_voucher.php file in view directory and $data variable has infor mation that you want to render on view.

 $this->load->library('M_pdf');
 
 $this->m_pdf->pdf->WriteHTML($html);
 
 //download it D save F.
 
 $this->m_pdf->pdf->Output("./uploads/".$filename, "F"); 
