
<?php if (session()->has('validation')) : ?>
    <?= session('validation')->listErrors() ?>
<?php endif; ?>