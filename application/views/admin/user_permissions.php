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
                            <label for="username" class="control-label">Name</label>
                            <span id="username" class="form-control" > <?php echo $user['name']?></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Email</label>
                            <span id="username" class="form-control" > <?php echo $user['email']?></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Menu options to allow</label><br>
                            
                            <?php for($i=0;$i<count($menu);$i++){?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="checkbox" name="permissions[]" value="<?php echo $menu[$i]['id']?>"
                                            <?php 
                                                if(in_array($menu[$i]['id'], explode(',', $permissions)))
                                                {
                                                    echo 'checked';
                                                }
                                            ?>
                                        > 
                                        <span> <?php echo $menu[$i]['name']?></span>
                                    </div>
                                    <?php if($menu[$i]['child']){?>
                                        <?php for($j=0;$j<count($menu[$i]['child']);$j++){?>
                                            <div class="col-md-2"></div>
                                            <div class="col-md-9">
                                                <input type="checkbox" name="permissions[]"
                                                 value="<?php echo $menu[$i]['child'][$j]['id']?>"
                                                <?php 
                                                    if(in_array($menu[$i]['child'][$j]['id'], explode(',', $permissions)))
                                                    {
                                                        echo 'checked';
                                                    }
                                                ?>
                                                > 
                                                <span> <?php echo $menu[$i]['child'][$j]['name']?></span>
                                            </div>
                                        <?php }?>
                                        <div class="clearfix"></div>
                                    <?php }?>
                                </div>
                            <?php }?>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Assign</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>