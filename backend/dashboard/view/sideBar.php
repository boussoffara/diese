<?php function display_side_bar($links){ ?>

<div class="sidebar-wrapper">
    <ul class="nav nav-sidebar">
        <?php foreach($links as $link){ ?>
        <li class="<?php echo $link['class']; ?>"><a href="<?php echo $link['target']; ?>"><i class="<?php echo $link['icon']; ?>">&nbsp;</i>&nbsp;<?php echo $link['name']; ?></a>
        </li>
        <?php } ?>
    </ul>
</div>
<?php } ?>