<?php
/**
 * Created by PhpStorm.
 * User: sun rise
 * Date: 8/2/2016
 * Time: 3:48 PM
 */
class Admin_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    public function checkUser($data)
    {
        $st=$this->db->select('*')->from('users')
            ->WHERE('email',$data['email'])
            ->WHERE('password',md5(sha1($data['password'])))
            ->get()->result_array();
        if(count($st)>0)
        {
            return $st[0];
        }
        else
        {
            return false;
        }
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Starts   ///
    ///                                 ///
    ///////////////////////////////////////
    public function getMenuParents()
    {
        return $this->db->select('*')->from('admin_menu')->where('parent',0)->get()->result_array();
    }
    public function addMenuItem($data)
    {
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name'],
            'class'=>$data['class'],
            'url'=>$data['url']
        );

        $this->db->insert('admin_menu',$item);
    }
    public function updateMenuItem($data,$menuId)
    {
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name'],
            'class'=>$data['class'],
            'url'=>$data['url']
        );

        $this->db->WHERE('id',$menuId)->update('admin_menu',$item);
    }
    public function getMenuItems()
    {
        $st=$this->db->select('*')->from('admin_menu')->where('parent',0)->get()->result_array();
        if(count($st)>0)
        {
            for($i=0;$i<count($st);$i++)
            {
                $st[$i]['child']=$this->db->select('*')->from('admin_menu')->where('parent',$st[$i]['id'])->get()->result_array();
            }
        }
        else
        {
            return false;
        }

        return $st;
    }
    public function getAllMenuItems()
    {
        return $this->db->query('SELECT admin_menu.*, a.name as parent from admin_menu left join admin_menu a on a.id=admin_menu.parent')->result_array();
    }
    public function getMenuItemDetail($menuId)
    {
        $st=$this->db->select('*')->from('admin_menu')->WHERE('id',$menuId)->get()->result_array();
        return $st[0];
    }
    public function delAdminMenu($id)
    {
        $this->db->query('DELETE from admin_menu WHERE id='.$id);
    }
    ///////////////////////////////////////
    ///                                 ///
    ///     Admin Menu Section Ends     ///
    ///                                 ///
    ///////////////////////////////////////
    public function getAll($table)
    {
        return $this->db->select('*')->from($table)->get()->result_array();
    }
    public function getAllById($table,$id)
    {
        $st= $this->db->select('*')->from($table)->WHERE('id',$id)->get()->result_array();
        return $st[0];
    }



}