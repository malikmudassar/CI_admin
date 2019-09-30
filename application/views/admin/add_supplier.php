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
                            <label for="username" class="control-label">Category</label>
                            <select class="form-control" name="category_id">
                                <?php
                                if(count($categories)>0) {
                                    for($i=0;$i<count($categories);$i++)
                                    {?>
                                        <option value="<?php echo $categories[$i]['id']?>"><?php echo $categories[$i]['name']?></option>
                                    <?php
                                    }}
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Name</label>
                            <input id="username" class="form-control" type="text" name="name" data-msg-required="Please enter your Menu Name." required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Code</label>
                            <input id="username" class="form-control" type="text" name="code" data-msg-required="Please enter your Menu Name." required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Address</label>
                            <input id="username" class="form-control" type="text" name="address" data-msg-required="Please enter your Menu Name." required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Contact</label>
                            <input id="username" class="form-control" type="text" name="phone" data-msg-required="Please enter your Menu Name." required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Add Supplier</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>