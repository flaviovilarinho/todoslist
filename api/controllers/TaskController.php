<?php

namespace api\controllers;

use yii\rest\ActiveController;
use yii\filters\AccessControl;

/**
 * Task controller for the `api` module
 */
class TaskController extends ActiveController
{
    public $modelClass = 'api\models\Task';

	public function behaviors()
	{
        $behaviors = parent::behaviors();

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

		return $behaviors;
	}
}
