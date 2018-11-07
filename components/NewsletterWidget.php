<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 11/7/2018
 * Time: 9:00 PM
 */

namespace app\components;

use yii\base\Widget;

class NewsletterWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Nothing ...';
        }
        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();
        return '<p>' . $this->message .'</p>' . $content;
    }
}
?>