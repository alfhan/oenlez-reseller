<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
    <?php
        $child_menu = $this->auth->child_menu();
        foreach ($this->auth->parent_menu() as $row) {
    ?>
    <li class="treeview active">
        <a href="<?php echo base_url($row['url']);?>">
            <i class="<?php echo $row['icon'];?>"></i> <span><?php echo $row['nama'];?></span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <?php 
                foreach ($child_menu as $r) { 
                    if($r['parent_id'] == $row['id']){
            ?>
                        <li><a href="<?php echo base_url($r['url']);?>"><i class="fa fa-angle-double-right"></i> <?php echo $r['nama'];?></a></li>
            <?php 
                    }
                }
            ?>
        </ul>
    </li>
    <?php } ?>
</ul>