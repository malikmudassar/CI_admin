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
    public function addUser($data)
    {
        $item=array(
            'name'  => $data['name'],
            'email' =>  $data['email'],
            'password'  => md5(sha1($data['password'])),
            'role'  => 1
        );
        $this->db->insert('users', $item);
    }

    public function updateUser($id, $data)
    {
        $this->db->where('id', $id)->update('users'. $data);
    }

    public function assignLanguage($id, $data)
    {
        $item=array(
            'language'=> $data['language']
        );
        $this->db->where('id', $id)->update('users', $item);
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
        $st=$this->db->select('*')->from('admin_menu')->where('parent',0)->order_by('id','asc')->get()->result_array();
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

    /////////////////////////////////////

    public function addSingleItem($table, $data)
    {
        $item=array(
            'name'=>$data['name']
        );

        $this->db->insert($table,$item);
    }

    public function delSingleItem($table, $id)
    {
        $this->db->query('DELETE from '.$table.' where id='.$id);
    }

    public function updateSingleItem($table, $data, $id)
    {
        $item=array(
            'name'=>$data['name']
        );

        $this->db->WHERE('id',$id)->update($table,$item);
    }

    public function getSingleItem($table, $id)
    {
        $st=$this->db->select('*')->from($table)->WHERE('id',$id)->get()->result_array();
        return $st[0];
    }
    ///////////////////////////////
    public function getCatParents()
    {
        return $this->db->select('*')->from('categories')->where('parent',0)->get()->result_array();
    }
    public function addCatItem($data)
    {
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name']
        );

        $this->db->insert('categories',$item);
    }
    public function updateCatItem($data,$menuId)
    {
        $item=array(
            'parent'=>$data['parent'],
            'name'=>$data['name']
        );

        $this->db->WHERE('id',$menuId)->update('categories',$item);
    }
    public function getCatItems()
    {
        $st=$this->db->select('*')->from('categories')->where('parent',0)->order_by('id','asc')->get()->result_array();
        if(count($st)>0)
        {
            for($i=0;$i<count($st);$i++)
            {
                $st[$i]['child']=$this->db->select('*')->from('categories')->where('parent',$st[$i]['id'])->get()->result_array();
            }
        }
        else
        {
            return false;
        }

        return $st;
    }
    public function getAllCatItems()
    {
        return $this->db->query('SELECT categories.*, a.name as parent from categories left join categories a on a.id=categories.parent')->result_array();
    }
    public function getCatItemDetail($menuId)
    {
        $st=$this->db->select('*')->from('categories')->WHERE('id',$menuId)->get()->result_array();
        return $st[0];
    }
    public function delCategory($id)
    {
        $this->db->query('DELETE from categories WHERE id='.$id);
    }

    // Insert or Update Category Features
    public function insertorUpdateCatFeatures($catId, $data)
    {
        // print_r($data);exit;
        $item=array(
            'category_id'=> $catId,
            'features'  =>  implode(',',$data['features'])
        );

        $this->db->query('DELETE from category_features where category_id='.$catId);
        $this->db->insert('category_features', $item);
        return true;
    }

    public function getCatFeatures($catId)
    {
        $st=$this->db->select('*')->from('category_features')->where('category_id', $catId)
        ->get()->result_array();
        return $st[0]['features'];
    }

    public function addSupplier($data)
    {
        $this->db->insert('suppliers', $data);
        return true;
    }

    public function delSupplier($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('suppliers');
    }

    public function getAllSuppliers()
    {
        return $this->db->query('SELECT suppliers.id,suppliers.name, suppliers.code, categories.name as category, suppliers.phone from suppliers inner join categories on categories.id=suppliers.category_id ')->result_array();
    }

    public function insertorUpdatePermissions($id, $data)
    {
        // print_r($data);exit;
        $item=array(
            'user_id'=> $id,
            'permissions'  =>  implode(',',$data['permissions'])
        );

        $this->db->query('DELETE from user_permissions where user_id='.$id);
        $this->db->insert('user_permissions', $item);
        return true;
    }

    public function getUserPermissions($id)
    {
        $st=$this->db->select('*')->from('user_permissions')->where('user_id',$id)->get()
        ->result_array();
        return $st[0]['permissions'];
    }

    // Add Product

    public function addProduct($data)
    {
        $this->db->insert('product', $data);
        return $this->db->insert_id();
    }

    public function updateProduct($id,$data)
    {
        $this->db->where('id', $id)->update('product', $data);
        return true;
    }

    public function addProductFeatures($id, $data)
    {
        $this->db->where('product_id',$id)->delete('prod_cat_feature_values');
        foreach($data['cat'] as $key => $value)
        {
            $item=array(
                'product_id'    => $id,
                'feature_id'    => $key,
                'value'         => $value
            );            
            $this->db->insert('prod_cat_feature_values', $item);
        }
        $item=array(
            'product_id'    => $id,
            'brand_id'      => $data['brand_id'],
            'shape_id'      => $data['shape_id'],
            'surface_id'      => $data['surface_id'],
            'pattern_id'      => $data['pattern_id'],
        );
        $this->db->where('product_id', $id)->delete('product_features');
        $this->db->insert('product_features', $item);
       return true;
    }

    public function getProductFeaturesById($id)
    {
        $data=array();
        $data['cat']=$this->db->select('*')->from('prod_cat_feature_values')
                        ->where('product_id',$id)->get()->result_array();
        $data['features']=$this->db->select('*')->from('product_features')
                        ->where('product_id', $id)->get()->result_array();
        return $data;
    }

    public function insertProductImages($id, $data)
    {
        for($i=0;$i<count($data);$i++)
        {
            $item=array(
                'product_id'    =>  $id,
                'file_name'     =>  $data[$i]['file_name'],
                'uploaded_on'   =>  $data[$i]['uploaded_on']
            );
            $this->db->insert('product_images', $item);
        }
    }

    public function getProductImages($id)
    {
        $st=$this->db->select('*')->from('product_images')->where('product_id', $id)->get()->result_array();
        return $st;
    }

    public function getFeaturesByProductId($id)
    {
        $st=$this->db->select('*')->from('product')->where('id',$id)->get()->result_array();
        $catId=$st[0]['category'];
        $features=$this->getCatFeatures($catId);
        $list=array();
        $features_list=explode(',',$features);
        for($i=0;$i<count($features_list);$i++)
        {
            $st=$this->db->select('*')->from('features')->where('id', $features_list[$i])
            ->get()->result_array();
            $list[$i]=$st[0];
        }
        return $list;
    }

    public function getProducts()
    {
        $st=$this->db->query('SELECT product.*, categories.name as category_name from product
        inner join categories on categories.id=product.category
        ')->result_array();
        return $st;
    }


}