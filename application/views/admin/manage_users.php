<div class="layout-content">
    <div class="layout-content-body">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                                <thead>
                                <tr>
                                    <th>Sr. #</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Language</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php for($i=0;$i<count($menu_items);$i++){?>
                                    <tr>
                                        <td data-order="Jessica Brown">
                                            <strong><?php echo $i+1;?></strong>
                                        </td>
                                        <td class="maw-320">
                                            <span class="truncate"><?php echo $menu_items[$i]['name']?></span>
                                        </td>
                                        <td><?php echo $menu_items[$i]['email']?></td>
                                        <td>Admin</td>
                                        <td>
                                        <a href="<?php echo base_url().'admin/user_permissions/'.$menu_items[$i]['id'];?>" title="Assign Permissions" class="btn btn-default"><i class="icon icon-key"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/assign_language/'.$menu_items[$i]['id'];?>" title="Assign Language" class="btn btn-info"><i class="icon icon-phone"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/edit_category/'.$menu_items[$i]['id'];?>" class="btn btn-default"><i class="icon icon-pencil"></i></a>
                                            <button class="btn btn-danger" onclick="validate(this)" value="<?php echo $menu_items[$i]['id']?>"><i class="icon icon-times"></i></button>
                                            <a href="<?php echo base_url().'admin/category_feature/'.$menu_items[$i]['id'];?>" title="Category Features" class="btn btn-info"><i class="icon icon-server"></i></a>
                                        </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo BASE_URL?>assets/js/sweetalert.min.js"></script>
<script>
    $(function(){ TablesDatatables.init(); });
    function validate(a)
    {
        var id= a.value;

        swal({
                title: "Are you sure?",
                text: "You want to delete this Category!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Category has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>admin/del_category/'+id);
            }
        );
    }
</script>