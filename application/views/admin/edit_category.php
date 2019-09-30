<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-4">
            <div class="login-body">
                <?php if(isset($errors)){?>
                    <div class="alert alert-danger">
                        <?php print_r($errors);?>
                    </div>
                <?php }?>
                <?php if(isset($success)){?>
                    <div class="alert alert-success">
                        <?php print_r($success);?>
                    </div>
                <?php }?>
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <div class="form-group">
                            <label for="username" class="control-label">Parent</label>
                            <select class="form-control" name="parent">
                                <option value="0">Main</option>
                                <?php
                                if(count($parents)>0) {
                                    for($i=0;$i<count($parents);$i++)
                                    {?>
                                        <option value="<?php echo $parents[$i]['id']?>" <?php if($menu_item['parent']==$parents[$i]['id']){echo 'selected';}?> ><?php echo $parents[$i]['name']?></option>
                                    <?php
                                    }}
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Name</label>
                            <input id="username" class="form-control" type="text" name="name" data-msg-required="Please enter your Menu Name." required value="<?php echo $menu_item['name']?>">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Update Item</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>