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
                            <span class="form-control"><?php echo $menu_item['name']?></span>
                            
                        </div>
                        <div class="form-group">
                            <label class="conrol-label">Features </label>
                            <?php foreach($features as $feature){?>
                                <div >
                                    <input type="checkbox" name="features[]" value="<?php echo $feature['id']?>" 
                                        <?php 
                                        if(in_array($feature['id'], explode(',', $cat_features)))
                                        {
                                            echo 'checked';
                                        }
                                        ?>
                                    > <?php echo $feature['name']?>
                                    
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