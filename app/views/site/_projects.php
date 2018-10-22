<?php
use yii\widgets\ListView;
?>

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span><?= $model->name ?></span>
            <div class="pull-right">
                <button name="edit-project" data-toggle="modal" data-target="#modalproject<?= $model->id ?>" value="<?= $model->id ?>" class="editproject btn btn-xs btn-info"><i class="glyphicon glyphicon-pencil"></i></button>
                <button value="<?= $model->id ?>" class="deleteproject btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </div>
        <div class="panel-body">
            <h4 class="page-header">Todo</h4>
            <ul class="list-group">
            <?php foreach(array_filter($model->tasks, function($t) { return empty($t->done_at); }) as $task) : ?>
                <li class="list-group-item" style="border: none;">
                    <div class="row">
                    <div class="col-xs-1">
                        <input type="checkbox" name="done-task" class="donetask" value="<?= $task->id ?>" />
                    </div>
                    <div class="col-xs-10">
                        <?= $task->description; ?>
                    </div>
                    <div class="col-xs-1">
                        <button value="<?= $task->id ?>" class="deletetask btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                    </div>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>

            <hr>

            <h4 class="page-header">Done</h4>
            <ul class="list-group">
            <?php foreach(array_filter($model->tasks, function($t) { return !empty($t->done_at); }) as $task) : ?>
                <li class="list-group-item" style="border: none;">
                    <span data-toggle="tooltip" data-placement="right" title="<?= $task->done_at ?>"><?= $task->description; ?></span>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div class="panel-footer text-right">
            <form class="form-inline">
                <div class="form-group">
                    <input type="hidden" name="project-id" value="<?= $model->id ?>">
                    <input type="text" name="task-description" class="form-control input-sm" placeholder="Task" />
                    <button class="addtask btn btn-xs btn-info">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalproject<?= $model->id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">Edit Name</div>
                <div class="modal-body">
                    <input type="hidden" name="id-project" value="<?= $model->id ?>" />
                    <input type="text" name="title-project" value="<?= $model->name ?>" class="form-control" />
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button class="changenameproject btn btn-success" data-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>