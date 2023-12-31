<?php

namespace app\modules\subscribe\controllers;

use yii\web\Controller;

/**
 * Default controller for the `subscribe` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Renders card list
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }
}
