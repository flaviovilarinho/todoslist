<?php

namespace api\controllers;

use yii\rest\ActiveController;
use yii\filters\AccessControl;

/**
 * Project controller for the `api` module
 */
class ProjectController extends ActiveController
{
    public $modelClass = 'api\models\Project';

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
