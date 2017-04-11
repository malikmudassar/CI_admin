<div class="login" style="margin-top: 50px;;">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="login-body">

                <h2>Knock! Knock! </h2>

            <h3 class="login-heading">Who are you?</h3>
            <?php if(isset($errors)){?>
                <div class="alert alert-danger">
                    <?php print_r($errors);?>
                </div>
            <?php }?>
            <div class="login-form">
                <form data-toggle="validator" action="" method="post">
                    <div class="form-group">
                        <label for="username" class="control-label">Email</label>
                        <input id="username" class="form-control" type="text" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your Email." required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Let me In</button>
                    </div>
                    <div class="form-group">
                        <ul class="list-inline">
                            <li>
                                <label class="custom-control custom-control-primary custom-checkbox">
                                    <input class="custom-control-input" type="checkbox">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-label">Keep me signed in</span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script src="<?php echo base_url()?>assets/js/vendor.min.js"></script>
<script src="<?php echo base_url()?>assets/js/elephant.min.js"></script>

</body>