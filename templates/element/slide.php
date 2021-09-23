<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block"><?= $user1->first_name.' '.$user1->last_name;?></a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt active"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
<!--                            <a href="./index.html" class="nav-link active">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Edit Profile</p>-->
<!--                            </a>-->
                            <?= $this->Html->link("Edit Profile", ['controller' => 'Users','action' => 'edit',$user1->id] ,['class' => 'educate-icon educate-event icon-wrap sub-icon-mg']) ?>

                        </li>
                        <li class="nav-item">
<!--                            <a href="./index.html" class="nav-link active">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Change Password</p>-->
<!--                            </a>-->
                            <?= $this->Html->link("Change Password", ['controller' => 'Users','action' => 'change',$user1->id] ,['class' => 'educate-icon educate-event icon-wrap sub-icon-mg']) ?>
                        </li>
                        <li class="nav-item">
<!--                            <a href="./index3.html" class="nav-link">-->
<!--                                <i class="far fa-circle nav-icon"></i>-->
<!--                                <p>Logout</p>-->
<!--                            </a>-->
                            <?= $this->Html->link("logout", ['controller' => 'Users','action' => 'logout'] ,['class' => 'educate-icon educate-event icon-wrap sub-icon-mg']) ?>
                        </li>
                    </ul>
                </li>
                <?php if($user1->role_id=="7594fbb1-1a31-4236-b636-73de2352a703"){ ?>
                <li class="nav-item">
<!--                    <a href="pages/users.html" class="nav-link">-->
<!--                        <i class="nav-icon fas fa-th"></i>-->
<!--                        <p>-->
<!--                            Users-->
<!--                        </p>-->
<!--                    </a>-->

                    <?= $this->Html->link("Users", ['controller' => 'Users','action' => 'index'],['class' => ['nav-link','nav-icon fas fa-chart-pie']]) ?>
                </li>
                <?php } ?>
                <li class="nav-item">
<!--                    <a href="pages/widgets.html" class="nav-link">-->
<!--                        <i class="nav-icon fas fa-chart-pie"></i>-->
<!--                        <p>-->
<!--                            Categories-->
<!--                        </p>-->
<!--                    </a>-->
                    <?= $this->Html->link("Categories", ['controller' => 'Categories','action' => 'index'],['class' => ['nav-link','nav-icon fas fa-chart-pie']]) ?>
                </li>
                <li class="nav-item">
<!--                    <a href="pages/articles.html" class="nav-link">-->
<!--                        <i class="nav-icon fas fa-tree"></i>-->
<!--                        <p>-->
<!--                            Articles-->
<!--                        </p>-->
<!--                    </a>-->
                    <?= $this->Html->link("Articles", ['controller' => 'Articles','action' => 'index'],['class' => ['nav-link','nav-icon fas fa-tree']]) ?>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
