<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Admin extends My_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('My_PHPMailer');
    }

    public function index()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/dashboard');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_menu()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_menu');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addMenuItem($_POST);
                    $data['success']='Congratulations! Menu Item Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_menu');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['parents']=$this->admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='SmartBABA ERP';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_menu');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'parent',
                        'label' =>  'Parent',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_admin_menu');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateMenuItem($_POST,$menuId);
                    $data['success']='Congratulations! Menu Item Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getMenuItemDetail($menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_admin_menu');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['parents']=$this->admin_model->getMenuParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_admin_menu');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_admin_menu()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delAdminMenu($menuId);
        redirect(base_url().'admin/manage_admin_menu');
    }
    public function manage_admin_menu()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAllMenuItems();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_admin_menu');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////



    //////////////////////////////
    // testing stuff //
    //////////////////////////////

/*public function mdfTest()
{
    $data['title']='test';
    $head=$this->load->view('static/head', $data);
    $body=$this->load->view('admin/login');

    $pdfFilePath = time()."_order.pdf";
    $this->load->library('M_pdf');
    //$html="<html><h1>This is test pdf</h1></html>";
    $html="
    <div style='width:80%; margin: 0 auto;'>
    <div style='margin-top: 50px; background-color: #00b29e; color:white ;'>
        <h2>Please Login</h2>
    </div>
    </div>
    ";
    $this->m_pdf->pdf->WriteHTML($html);

    //download it.
    $this->m_pdf->pdf->Output($pdfFilePath, "D");
    echo 'Done';
}*/



}
?>
