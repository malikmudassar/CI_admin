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
                                    <th>Code</th>
                                    <th>Category</th>
                                    <th>Price</th>
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
                                        <td><?php echo $menu_items[$i]['code']?></td>
                                        <td><?php echo $menu_items[$i]['category_name']?></td>
                                        <td><?php echo $menu_items[$i]['price']?></td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/edit_supplier/'.$menu_items[$i]['id'];?>" class="btn btn-default"><i class="icon icon-pencil"></i></a>
                                            <a href="<?php echo base_url().'admin/edit_product_features/'.$menu_items[$i]['id'];?>" title="Product Features" class="btn btn-info"><i class="icon icon-server"></i></a>
                                            <a href="<?php echo base_url().'admin/edit_product_images/'.$menu_items[$i]['id'];?>" title="Product Images" class="btn btn-warning"><i class="icon icon-image"></i></a>
                                            <button class="btn btn-danger" onclick="validate(this)" value="<?php echo $menu_items[$i]['id']?>"><i class="icon icon-times"></i></button>
                                            
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
                text: "You want to delete this Supplier!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Supplier has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>admin/del_supplier/'+id);
            }
        );
    }
</script>