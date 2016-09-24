<?php
namespace wokaextend;
use Yii;
use yii\web\Controller;

class BackendController extends Controller
{   
    
    /**
     * Redirects the browser to the home page.
     *
     * You can use this method in an action by returning the [[Response]] directly:
     * ```php
     * // stop executing this action and redirect to home page
     * return $this->goHome();
     * ```
     * @return Response the current response object
     */
    public function goHome()
    {
        return Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
    }
  
}