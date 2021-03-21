<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form','url'));
    }


	public function index()
	{
		 $this->load->helper('url');
		 $this->load->view('include/header');
		$this->load->view('possystem');
		$this->load->view('/include/footer');
	}


	public function print_pdf()
	{



		$name          =$this->input->post('name');
		$qty          =$this->input->post('quantity');
		$unitprice          =$this->input->post('unitprice');
		$taxrate          =$this->input->post('taxrate');
		$amountwithouttax          =$this->input->post('amountwithouttax');
		$amount          =$this->input->post('amount');
        $subtotaltaxwithouttax      =$this->input->post('subtotaltaxwithouttax');
       
        $discountvalue              =$this->input->post('discountvalue');
        $discounttype              =$this->input->post('discounttype');
        $subtotalwithtax          =$this->input->post('subtotalwithtax');
        $totalPrice          =$this->input->post('totalPrice');

        $data['subtotaltaxwithouttax']=$subtotaltaxwithouttax ;
        $data['subtotalwithtax']=$subtotalwithtax ;
        if (!empty($_POST['discountvalue'])) {
           $data['discountvalue']=$discountvalue ;
            $data['discounttype']=$discounttype ;
       }
       else
       {
        $data['discountvalue']=0 ;
        $data['discounttype']=0 ;
       }

        $data['totalPrice']=$totalPrice ;


        
        
        

      


         $cnt = count(array_filter($name, function($x) { return !empty($x); }));
		$data['tabledata']=array('names'=>$name,'qty'=>$qty,'unitprice'=>$unitprice,'taxrate'=>$taxrate,'amountwithouttax'=>$amountwithouttax,'amount'=>$amount);
       
        $data['counting']=$cnt ;
        
	   $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('printdata',$data,true);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

			
            }


         
      
}

