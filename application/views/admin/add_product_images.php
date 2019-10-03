<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-4">
            <div class="login-body">
                <?php if(isset($errors)){?>
                    <div class="alert alert-danger">
                        <?php print_r($errors);?>
                    </div>
                <?php }?>
                <?php if(isset($this->session->flashdata['statusMsg'])){?>
                    <div class="alert alert-success">
                        <?php print_r($this->session->flashdata['statusMsg']);?>
                    </div>
                <?php }?>
                <div class="login-form">
                <form method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Select Images</label>
                        <input type="file" name="files[]" multiple/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="fileSubmit" class="btn btn-primary" value="UPLOAD"/>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
            <div class="card">
                <ul class="gallery">
                    <?php if(!empty($productImages)){ foreach($productImages as $file){ ?>
                    <li class="item">
                        <img src="<?php echo BASE_URL.'uploads/files/'.$file['file_name']; ?>" 
                        style="height:100px; width:100px;"
                        >
                        <p>Uploaded On <?php echo date("j M Y",strtotime($file['uploaded_on'])); ?></p>
                    </li>
                    <?php } }else{ ?>
                    <h6>No image(s) uploaded yet.....</h6>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>