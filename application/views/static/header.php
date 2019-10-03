<body class="layout layout-header-fixed">
<div class="layout-header">
    <div class="navbar navbar-default" style="">
        <div class="navbar-header"  >
            <a class="navbar-brand navbar-brand-center" href="<?php echo base_url()?>" style="color:#fff">
                <strong>Admin Panel</strong>
            </a>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
                <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
            </button>
            <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">

            </span>
            </button>
        </div>
        <div class="navbar-toggleable">
            <nav id="navbar" class="navbar-collapse collapse">
                <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
                    <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
                </button>
                
                <ul class="nav navbar-nav navbar-right">
                
                    <li class="visible-xs-block">
                        <h4 class="navbar-text text-center">Hi, <?php echo $this->session->userdata['name']?></h4>
                        
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <form class="navbar-search navbar-search-collapsed">
                            <div class="navbar-search-group">
                                <input class="navbar-search-input" type="text" placeholder="Search for people, companies, and more&hellip;">
                                <button class="navbar-search-toggler" title="Expand search form ( S )" aria-expanded="false" type="submit">
                                    <span class="icon icon-search icon-lg"></span>
                                </button>
                                <button class="navbar-search-adv-btn" type="button">Advanced</button>
                            </div>
                        </form>
                    </li>
                    <li class="dropdown hidden-xs">
                        <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                            <?php echo $this->session->userdata['name']?>
                            <span class="caret"></span>
                        </button>
                        <?php
                        $controller=$this->uri->segment(1);
                        ?>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo base_url().$controller.'/edit_profile'?>">Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Settings</a></li>
                            <li><a href="<?php echo base_url().$controller.'/logout'?>">Sign out</a></li>
                        </ul>
                    </li>

                </ul>
                
            </nav>
        </div>
    </div>
</div>