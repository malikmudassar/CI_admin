<div class="layout-content">
    <div class="layout-content-body">
        
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
                        <div class="col-md-4">
                        <fieldset>
                            <label>Category Features</label>
                            <?php $cat=array();?>
                            <?php for($i=0;$i<count($cat_features);$i++){?>
                                <div class="form-group">
                                    <label><?php echo $cat_features[$i]['name']?></label>
                                    <input type="text" name="cat[<?php echo $cat_features[$i]['id']?>]" class="form-control">
                                </div>
                            <?php }?>
                                               
                        </fieldset>
                        </div>
                        <div class="col-md-4">
                        <fieldset>
                            <label><?php echo $this->lang->line('Prod_features');?></label>
                            <div class="form-group">
                                <label class="control-label"><?php echo $this->lang->line('Brand');?></label>
                                <select class="form-control" name="brand_id">
                                    <?php
                                    if(count($brands)>0) {
                                        for($i=0;$i<count($brands);$i++)
                                        {?>
                                            <option value="<?php echo $brands[$i]['id']?>"><?php echo $brands[$i]['name']?></option>
                                        <?php
                                        }}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo $this->lang->line('Shape');?></label>
                                <select class="form-control" name="shape_id">
                                    <?php
                                    if(count($shapes)>0) {
                                        for($i=0;$i<count($shapes);$i++)
                                        {?>
                                            <option value="<?php echo $shapes[$i]['id']?>"><?php echo $shapes[$i]['name']?></option>
                                        <?php
                                        }}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo $this->lang->line('Surface');?></label>
                                <select class="form-control" name="surface_id">
                                    <?php
                                    if(count($surfaces)>0) {
                                        for($i=0;$i<count($surfaces);$i++)
                                        {?>
                                            <option value="<?php echo $surfaces[$i]['id']?>"><?php echo $surfaces[$i]['name']?></option>
                                        <?php
                                        }}
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label"><?php echo $this->lang->line('Pattern');?></label>
                                <select class="form-control" name="pattern_id">
                                    <?php
                                    if(count($patterns)>0) {
                                        for($i=0;$i<count($patterns);$i++)
                                        {?>
                                            <option value="<?php echo $patterns[$i]['id']?>"><?php echo $patterns[$i]['name']?></option>
                                        <?php
                                        }}
                                    ?>
                                </select>
                            </div>
                            
                        </fieldset>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>

        
    </div>
</div>