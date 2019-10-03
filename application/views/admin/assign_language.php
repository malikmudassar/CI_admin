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
                            <label for="username" class="control-label">Languages</label>
                            <select class="form-control" name="language">
                                <?php
                                if(count($languages)>0) {
                                    for($i=0;$i<count($languages);$i++)
                                    {?>
                                        <option value="<?php echo $languages[$i]['id']?>"
                                        <?php if($user['language']==$languages[$i]['id']){ echo 'selected';}?>
                                        ><?php echo $languages[$i]['name']?></option>
                                    <?php
                                    }}
                                ?>
                            </select>
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