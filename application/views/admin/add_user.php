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
                            <input id="username" class="form-control" type="text" name="name" data-msg-required="Please enter user's name." required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Email</label>
                            <input id="password" class="form-control" type="text" name="email" data-msg-required="Please enter user's email." required>
                        </div>
                        <div class="form-group">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" class="form-control" type="password" name="password" data-msg-required="Please enter user's password." required>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Confirm Password</label>
                            <input id="username" class="form-control" type="password" name="conf_password" data-msg-required="Please confirm the password." required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Add User</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>