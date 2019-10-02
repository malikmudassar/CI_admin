<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 11/20/2016
 * Time: 2:37 PM
 */

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        // $this->load->library('My_PHPMailer');
    }

    public function index()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            // echo '<pre>';print_r($data);exit;
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


    ///////////////////////////////////////
    ///                                 ///
    ///     Brands Section Starts       ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_brands()
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
                    $this->load->view('admin/add_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSingleItem('brands',$_POST);
                    $data['success']='Congratulations! Brand Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_single');
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
                $this->load->view('admin/add_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_brand()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getSingleItem('brands',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
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
                    $data['menu_item']=$this->admin_model->getSingleItem('brands',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateSingleItem('brands',$_POST,$menuId);
                    $data['success']='Congratulations! Brand Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getSingleItem('brands',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
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
                $this->load->view('admin/edit_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_brand()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('brands',$menuId);
        redirect(base_url().'admin/manage_brands');
    }
    public function manage_brands()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('brands');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_singles');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Brands Section Ends         ///
    ///                                 ///
    ///////////////////////////////////////


    ///////////////////////////////////////
    ///                                 ///
    ///     Shapes Section Starts       ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_shape()
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
                    $this->load->view('admin/add_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSingleItem('shapes',$_POST);
                    $data['success']='Congratulations! Shape Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_single');
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
                $this->load->view('admin/add_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_shape()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getSingleItem('shapes',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
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
                    $data['menu_item']=$this->admin_model->getSingleItem('shapes',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateSingleItem('shapes',$_POST,$menuId);
                    $data['success']='Congratulations! Shape Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getSingleItem('shapes',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
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
                $this->load->view('admin/edit_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_shape()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('shapes',$menuId);
        redirect(base_url().'admin/manage_shapes');
    }
    public function manage_shapes()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('shapes');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_singles');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Shapes Section Ends         ///
    ///                                 ///
    ///////////////////////////////////////

    ///////////////////////////////////////
    ///                                 ///
    ///     Colors Section Starts       ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_color()
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
                    $this->load->view('admin/add_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSingleItem('colors',$_POST);
                    $data['success']='Congratulations! Color Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_single');
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
                $this->load->view('admin/add_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_color()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getSingleItem('colors',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
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
                    $data['menu_item']=$this->admin_model->getSingleItem('colors',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateSingleItem('colors',$_POST,$menuId);
                    $data['success']='Congratulations! Color Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getSingleItem('colors',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
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
                $this->load->view('admin/edit_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_color()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('colors',$menuId);
        redirect(base_url().'admin/manage_colors');
    }
    public function manage_colors()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('colors');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_singles');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Colors Section Ends         ///
    ///                                 ///
    ///////////////////////////////////////

    ///////////////////////////////////////
    ///                                 ///
    ///     Colors Section Starts       ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_surface()
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
                    $this->load->view('admin/add_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSingleItem('surfaces',$_POST);
                    $data['success']='Congratulations! Surface Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_single');
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
                $this->load->view('admin/add_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_surface()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getSingleItem('surfaces',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
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
                    $data['menu_item']=$this->admin_model->getSingleItem('surfaces',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateSingleItem('surfaces',$_POST,$menuId);
                    $data['success']='Congratulations! Surface Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getSingleItem('surfaces',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
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
                $this->load->view('admin/edit_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_surface()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('surfaces',$menuId);
        redirect(base_url().'admin/manage_surfaces');
    }
    public function manage_surfaces()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('surfaces');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_singles');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Surface Section Ends        ///
    ///                                 ///
    ///////////////////////////////////////

    ///////////////////////////////////////
    ///                                 ///
    ///     Colors Section Starts       ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_pattern()
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
                    $this->load->view('admin/add_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSingleItem('patterns',$_POST);
                    $data['success']='Congratulations! Pattern Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_single');
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
                $this->load->view('admin/add_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_pattern()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getSingleItem('patterns',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
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
                    $data['menu_item']=$this->admin_model->getSingleItem('patterns',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateSingleItem('patterns',$_POST,$menuId);
                    $data['success']='Congratulations! Pattern Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getSingleItem('patterns',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
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
                $this->load->view('admin/edit_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_pattern()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('patterns',$menuId);
        redirect(base_url().'admin/manage_patterns');
    }
    public function manage_patterns()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('patterns');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_singles');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Colors Section Ends         ///
    ///                                 ///
    ///////////////////////////////////////


    ///////////////////////////////////////
    ///                                 ///
    ///     Categories Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_category()
    {
        if($this->isLoggedIn())
        {
            $data['parents']=$this->admin_model->getCatParents();
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
                    $this->load->view('admin/add_category');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addCatItem($_POST);
                    $data['success']='Congratulations! Category Added Successfully';
                    $data['parents']=$this->admin_model->getCatParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_category');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                $data['parents']=$this->admin_model->getCatParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_category');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_category()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getCatParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getCatItemDetail($menuId);
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
                    $data['parents']=$this->admin_model->getCatParents();
                    $data['menu_item']=$this->admin_model->getCatItemDetail($menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_category');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateCatItem($_POST,$menuId);
                    $data['success']='Congratulations! Category Updated Successfully';
                    $data['parents']=$this->admin_model->getCatParents();
                    $data['menu']=$this->admin_model->getCatItems();
                    $data['menu_item']=$this->admin_model->getCatItemDetail($menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_category');
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
                $this->load->view('admin/edit_category');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_category()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delCategory($menuId);
        redirect(base_url().'admin/manage_categories');
    }
    public function manage_categories()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAllCatItems();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_categories');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Categories Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////

    ///////////////////////////////////////
    ///                                 ///
    ///     Features Section Starts     ///
    ///                                 ///
    ///////////////////////////////////////
    public function add_feature()
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
                    $this->load->view('admin/add_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSingleItem('features',$_POST);
                    $data['success']='Congratulations! Feature Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_single');
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
                $this->load->view('admin/add_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_feature()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getSingleItem('features',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
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
                    $data['menu_item']=$this->admin_model->getSingleItem('features',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateSingleItem('features',$_POST,$menuId);
                    $data['success']='Congratulations! Feature Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getSingleItem('features',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_single');
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
                $this->load->view('admin/edit_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_feature()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('features',$menuId);
        redirect(base_url().'admin/manage_features');
    }
    public function manage_features()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('features');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_singles');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Features Section Ends       ///
    ///                                 ///
    ///////////////////////////////////////

    public function category_feature()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['features']=$this->admin_model->getAll('features');
            $data['cat_features']=$this->admin_model->getCatFeatures($menuId);
            $data['menu_item']=$this->admin_model->getCatItemDetail($menuId);
            if($_POST)
            {
                // echo '<pre>';print_r($_POST);exit;
                $catId=$this->uri->segment(3);
                $this->admin_model->insertorUpdateCatFeatures($catId, $_POST);
                $data['success']='Congratulations! Features assigned successfully';
                $data['cat_features']=$this->admin_model->getCatFeatures($catId);
                
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/category_feature');
                $this->load->view('static/footer');
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/category_feature');
                $this->load->view('static/footer');
            }
            
            
        }
        else
        {
            redirect(base_url().'');
        }
    }

    ////////////////////////
    // Add Product //
    ////////////////////////

    


    //// Supplier Section Starts

    public function add_supplier()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['categories']=$this->admin_model->getCatParents();
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'code',
                        'label' =>  'Code',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Admin Panel';
                    $data['categories']=$this->admin_model->getCatParents();
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_supplier');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSupplier($_POST);
                    $data['success']='Congratulations! Supplier Added Successfully';
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['categories']=$this->admin_model->getCatParents();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_supplier');
                    $this->load->view('static/footer');
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_supplier');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_supplier()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getAllById('suppliers',$menuId);
            $data['categories']=$this->admin_model->getCatParents();
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
                    $data['categories']=$this->admin_model->getCatParents();
                    $data['menu_item']=$this->admin_model->getAllById('suppliers',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_supplier');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateCatItem($_POST,$menuId);
                    $data['success']='Congratulations! Supplier Updated Successfully';
                    $data['menu']=$this->admin_model->getCatItems();
                    $data['menu_item']=$this->admin_model->getAllById('suppliers',$menuId);
                    $data['categories']=$this->admin_model->getCatParents();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_supplier');
                    $this->load->view('static/footer');
                }
            }
            else
            {   $data['categories']=$this->admin_model->getCatParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_supplier');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_supplier()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSupplier($menuId);
        redirect(base_url().'admin/manage_suppliers');
    }
    public function manage_suppliers()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAllSuppliers();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_suppliers');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    // Suppliers section ends

    //// Supplier Section Starts

    public function add_product()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['categories']=$this->admin_model->getCatParents();
            $data['supplier']=$this->admin_model->getAll('suppliers');
            $data['currency']=$this->admin_model->getAll('currencies');
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
                    array(
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'code',
                        'label' =>  'Code',
                        'rules' =>  'trim|required'
                    )
                );
                $this->form_validation->set_rules($config);
                if($this->form_validation->run()==false)
                {
                    $data['errors']=validation_errors();
                    $data['title']='Admin Panel';
                    $data['categories']=$this->admin_model->getCatParents();
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_product');
                    $this->load->view('static/footer');
                }
                else
                {
                    $id=$this->admin_model->addProduct($_POST);
                    $this->session->set_flashdata('success', 'Congratulations! Product Added Successfully. Please add features');
                    redirect(base_url().'admin/add_product_features/'.$id);
                }
            }
            else
            {
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_product');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function add_product_features()
    {
        if($this->isLoggedIn())
        {
            $id=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['brands']=$this->admin_model->getAll('brands');
            $data['shapes']=$this->admin_model->getAll('shapes');
            $data['surfaces']=$this->admin_model->getAll('surfaces');
            $data['patterns']=$this->admin_model->getAll('patterns');
            $data['cat_features']=$this->admin_model->getFeaturesByProductId($id);
            // echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $id=$this->admin_model->addProductFeatures($id, $_POST);
                $this->session->set_flashdata('success', 'Congratulations! Product Added Successfully. Please add features');
                redirect(base_url().'admin/add_product_images/'.$id);
            }
            else
            {
                // echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/add_product_features');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }

    
    public function edit_product()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getAllById('suppliers',$menuId);
            $data['categories']=$this->admin_model->getCatParents();
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
                    $data['categories']=$this->admin_model->getCatParents();
                    $data['menu_item']=$this->admin_model->getAllById('suppliers',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_product');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateCatItem($_POST,$menuId);
                    $data['success']='Congratulations! Supplier Updated Successfully';
                    $data['menu']=$this->admin_model->getCatItems();
                    $data['menu_item']=$this->admin_model->getAllById('suppliers',$menuId);
                    $data['categories']=$this->admin_model->getCatParents();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_product');
                    $this->load->view('static/footer');
                }
            }
            else
            {   $data['categories']=$this->admin_model->getCatParents();
                //echo '<pre>';print_r($data);exit;
                $data['title']='Admin Panel';
                $this->load->view('static/head',$data);
                $this->load->view('static/header');
                $this->load->view('static/sidebar');
                $this->load->view('admin/edit_product');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_product()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delProduct($menuId);
        redirect(base_url().'admin/manage_products');
    }
    public function manage_products()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getProducts();
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_products');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    // Suppliers section ends

    // Currency Section Starts
    public function add_currency()
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
                    $this->load->view('admin/add_currency');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addSingleItem('features',$_POST);
                    $data['success']='Congratulations! Currency Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_currency');
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
                $this->load->view('admin/add_single');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function edit_currency()
    {
        if($this->isLoggedIn())
        {
            $menuId=$this->uri->segment(3);
            $data['parents']=$this->admin_model->getMenuParents();
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_item']=$this->admin_model->getSingleItem('features',$menuId);
            //echo '<pre>';print_r($data);exit;
            if($_POST)
            {
                $config=array(
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
                    $data['menu_item']=$this->admin_model->getSingleItem('features',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_currency');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->updateSingleItem('features',$_POST,$menuId);
                    $data['success']='Congratulations! Feature Updated Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['menu_item']=$this->admin_model->getSingleItem('features',$menuId);
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/edit_currency');
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
                $this->load->view('admin/edit_currency');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function del_currency()
    {
        $menuId=$this->uri->segment(3);
        $this->admin_model->delSingleItem('currencies',$menuId);
        redirect(base_url().'admin/manage_currencies');
    }
    public function manage_currencies()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('currencies');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_currencies');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }
    // Currency Section Ends

    // Users section starts
    public function add_user()
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
                        'field' =>  'name',
                        'label' =>  'Name',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'email',
                        'label' =>  'Email',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'password',
                        'label' =>  'Password',
                        'rules' =>  'trim|required'
                    ),
                    array(
                        'field' =>  'conf_password',
                        'label' =>  'Confirm Password',
                        'rules' =>  'trim|required|matches[password]'
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
                    $this->load->view('admin/add_user');
                    $this->load->view('static/footer');
                }
                else
                {
                    $this->admin_model->addUser($_POST);
                    $data['success']='Congratulations! User Added Successfully';
                    $data['parents']=$this->admin_model->getMenuParents();
                    $data['menu']=$this->admin_model->getMenuItems();
                    $data['title']='Admin Panel';
                    $this->load->view('static/head',$data);
                    $this->load->view('static/header');
                    $this->load->view('static/sidebar');
                    $this->load->view('admin/add_user');
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
                $this->load->view('admin/add_user');
                $this->load->view('static/footer');
            }
        }
        else
        {
            redirect(base_url().'');
        }

    }
    public function manage_users()
    {
        if($this->isLoggedIn())
        {
            $data['menu']=$this->admin_model->getMenuItems();
            $data['menu_items']=$this->admin_model->getAll('users');
            //echo '<pre>';print_r($data);exit;
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/manage_users');
            $this->load->view('static/footer');
        }
        else
        {
            redirect(base_url().'');
        }
    }

    public function user_permissions()
    {
        $id=$this->uri->segment(3);
        $data['menu']=$this->admin_model->getMenuItems();
        $data['user']=$this->admin_model->getAllById('users', $id);
        $data['permissions']=$this->admin_model->getUserPermissions($id);
        // echo '<pre>';print_r($data['permissions']);exit;
        if($_POST)
        {
            // echo '<pre>';print_r($_POST);exit;
            $this->admin_model->insertOrUpdatePermissions($id, $_POST);
            $data['success']="Permissions Updated Successfully!";
            $data['permissions']=$this->admin_model->getUserPermissions($id);
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/user_permissions');
            $this->load->view('static/footer');
        }
        else
        {
            $data['title']='Admin Panel';
            $this->load->view('static/head',$data);
            $this->load->view('static/header');
            $this->load->view('static/sidebar');
            $this->load->view('admin/user_permissions');
            $this->load->view('static/footer');
        }
        
    }
    // Users section ends
    public function isLoggedIn()
    {
        if(!empty($this->session->userdata['id'])&& $this->session->userdata['type']=='admin')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    

}
?>
