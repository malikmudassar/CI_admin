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
                            <label for="username" class="control-label"><?php echo $this->lang->line('Parent');?></label>
                            <select class="form-control" name="parent">
                                <option value="0">Main</option>
                                <?php
                                if(count($parents)>0) {
                                    for($i=0;$i<count($parents);$i++)
                                    {?>
                                        <option value="<?php echo $parents[$i]['id']?>"><?php echo $parents[$i]['name']?></option>
                                    <?php
                                    }}
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label"><?php echo $this->lang->line('Name');?></label>
                            <input id="username" class="form-control" type="text" name="name" data-msg-required="Please enter your Menu Name." required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Class</label>
                            <input id="password" class="form-control" type="text" name="class" >
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Url</label>
                            <input id="username" class="form-control" type="text" name="url" >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit"><?php echo $this->lang->line('Add_item');?></button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>