<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 11/7/2018
 * Time: 9:42 PM
 */

namespace app\models;


use Yii;
use yii\db\ActiveRecord;

class NewsletterForm extends ActiveRecord
{
    const VALIDATE_ROUTE = 'validate-newsletter';
    const SAVE_ROUTE = 'save-newsletter';

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique'],
            'email' => [['email'], 'string', 'max' => 255],
        ];
    }

}