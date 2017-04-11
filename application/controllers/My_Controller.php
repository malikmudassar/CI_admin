<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 3/18/2017
 * Time: 2:36 PM
 */

class My_Controller extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
    }
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
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}