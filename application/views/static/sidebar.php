<div class="layout-main" >
    <div class="layout-sidebar" >
        <div class="layout-sidebar-backdrop" <!--style="background-color: #253449; color;#fff; "-->></div>
        <div class="layout-sidebar-body" >
            <div class="custom-scrollbar">
                <nav id="sidenav" class="sidenav-collapse collapse">
                    <ul class="sidenav">
                        <li class="sidenav-search hidden-md hidden-lg">
                            <form class="sidenav-form" action="http://demo.naksoid.com/">
                                <div class="form-group form-group-sm">
                                    <div class="input-with-icon">
                                        <input class="form-control" type="text" placeholder="Search…">
                                        <span class="icon icon-search input-icon"></span>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="sidenav-heading">Navigation</li>
                        <?php
                        if(count($menu)>0)
                        {
                            for($i=0;$i<count($menu);$i++)
                            {
                                ?>
                                <li class="sidenav-item <?php if(!empty($menu[$i]['child'])){ echo 'has-subnav';}?>">
                                    <a href="#" aria-haspopup="true">
                                        <span class="sidenav-icon <?php echo $menu[$i]['class']?>"></span>
                                        <span class="sidenav-label"><?php echo $menu[$i]['name']?></span>
                                    </a>
                                    <?php
                                    if(count($menu[$i]['child'])>0)
                                    {?>
                                        <ul class="sidenav-subnav collapse">
                                            <li class="sidenav-subheading"><?php echo $menu[$i]['name']?></li>
                                            <?php
                                            for($j=0;$j<count($menu[$i]['child']);$j++)
                                            {
                                                ?>
                                                <li><a href="<?php echo base_url().$menu[$i]['child'][$j]['url']?>"><?php echo $menu[$i]['child'][$j]['name']?></a></li>

                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    <?php
                                    }
                                    ?>

                                </li>
                            <?php
                            }
                        }
                        ?>
                        <?php if(!empty($this->session->userdata['id'])&& $this->session->userdata['type']=='admin'){?>
                        <li class="sidenav-heading">Menu</li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-lock"></span>
                                <span class="sidenav-label">Admin Nav</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Admin Menu</li>
                                <li><a href="<?php echo base_url().'admin/add_menu'?>" >Add Menu</a></li>
                                <li><a href="<?php echo base_url().'admin/manage_admin_menu'?>" >Manage</a></li>
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-lock"></span>
                                <span class="sidenav-label">Team Nav</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Team Navigation</li>
                                <li><a href="<?php echo base_url().'admin/add_team_menu'?>" >Add Menu</a></li>
                                <li><a href="<?php echo base_url().'admin/manage_team_menu'?>" >Manage</a></li>
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-lock"></span>
                                <span class="sidenav-label">Client Nav</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Client Navigation</li>
                                <li><a href="<?php echo base_url().'admin/add_client_menu'?>" >Add Menu</a></li>
                                <li><a href="<?php echo base_url().'admin/manage_client_menu'?>" >Manage</a></li>
                            </ul>
                        </li>
                        <li class="sidenav-item has-subnav">
                            <a href="#" aria-haspopup="true">
                                <span class="sidenav-icon icon icon-lock"></span>
                                <span class="sidenav-label">Managers Nav</span>
                            </a>
                            <ul class="sidenav-subnav collapse">
                                <li class="sidenav-subheading">Client Navigation</li>
                                <li><a href="<?php echo base_url().'admin/add_manager_menu'?>" >Add Menu</a></li>
                                <li><a href="<?php echo base_url().'admin/manage_manager_menu'?>" >Manage</a></li>
                            </ul>
                        </li>
                        <?php }?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <style>
        /*.sidenav-subnav>li>a {
        background-color: #2c3e50;
        }
        .sidenav>li.open>a {
            background-color: #2c3e50;
        }
        .sidenav-heading {
            color:#fff;
        }
        .sidenav>li>a {
            color:#fff;
        }*/
    </style>