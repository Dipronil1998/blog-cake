
<?php
/**
 * @var AppView $this
 * @var User $user1
 */
use App\Model\Entity\User;
use App\View\AppView;

echo $this->Html->css('all.min');
echo $this->Html->css('ionicons.min');
echo $this->Html->css('font-awesome');
echo $this->Html->css('tempusdominus-bootstrap-4.min');
echo $this->Html->css('https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css')
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="image">
            <?= $this->Html->image($user1->image,[
                'height'=>70,'width'=>70,'class'=>'img-circle elevation-2'
            ]); ?>
        </div>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="#" class="d-block"><?= $user1->first_name.' '.$user1->last_name;?></a>
            </div>
        </div>


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

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
                            <?= $this->Html->link("Edit Profile", ['controller' => 'Users','action' => 'edit',$user1->id] ,['class' => 'educate-icon educate-event']) ?>

                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link("Change Password", [
                                'controller' => 'Users',
                                'action' => 'change',
                                $user1->id
                            ] ,[
                                'class' => 'educate-icon educate-event'
                            ]) ?>
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link("logout", ['controller' => 'Users','action' => 'logout'] ,['class' => 'educate-icon educate-event icon-wrap sub-icon-mg']) ?>
                        </li>
                    </ul>
                </li>
                <?php if($user1->role_id=="a75f7e34-837a-4912-8abf-3078fd7017ec"){ ?>
                <li class="nav-item">

                    <?= $this->Html->link("Users", ['controller' => 'Users','action' => 'index'],['class' => ['nav-link','nav-icon fas fa-chart-pie']]) ?>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <?= $this->Html->link("Categories", ['controller' => 'Categories','action' => 'index'],['class' => ['nav-link','nav-icon fas fa-chart-pie']]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link("Articles", ['controller' => 'Articles','action' => 'index'],['class' => ['nav-link','nav-icon fas fa-tree']]) ?>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
