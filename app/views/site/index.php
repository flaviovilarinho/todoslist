<?php

/* @var $this yii\web\View */

use yii\widgets\Pjax;
use yii\widgets\ListView;

$this->title = 'TODOS.List';
?>
<div class="site-index">
    <h2 class="text-center">PROJECTS</h2>
    <hr>
    <?php Pjax::begin(['id' => 'list-projects']); ?>
        <?php echo ListView::widget([
            'dataProvider' => $projectsProvider,
            'itemView' => '_projects',
            'summary' => ''
        ]); ?>
    <?php Pjax::end() ?>
</div>