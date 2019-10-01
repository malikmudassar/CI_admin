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
                                    <th></th>
                                    <th></th>
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
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="<?php echo base_url().'admin/edit_brand/'.$menu_items[$i]['id'];?>" class="btn btn-default"><i class="icon icon-pencil"></i></a>
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
<?php
    $d=explode('_', $this->uri->segment(2));
    if($d[1]=='brands')
    {
        $partUri='del_brand';
    }
    elseif($d[1]=='shapes')
    {
        $partUri='del_shape';
    }
    elseif($d[1]=='patterns')
    {
        $partUri='del_pattern';
    }
    elseif($d[1]=='colors')
    {
        $partUri='del_color';
    }
    elseif($d[1]=='languages')
    {
        $partUri='del_language';
    }
    elseif($d[1]=='currencies')
    {
        $partUri='del_currency';
    }
    elseif($d[1]=='surfaces')
    {
        $partUri='del_surface';
    }
    elseif($d[1]=='features')
    {
        $partUri='del_feature';
    }
?>
<script src="<?php echo BASE_URL?>assets/js/sweetalert.min.js"></script>
<script>
    $(function(){ TablesDatatables.init(); });
    function validate(a)
    {
        var id= a.value;

        swal({
                title: "Are you sure?",
                text: "You want to delete this Item!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Item has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>admin/<?php echo $partUri?>/'+id);
            }
        );
    }
</script>