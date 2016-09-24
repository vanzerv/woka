<?php

namespace wokaextend\components\qrcode\formats;

use yii\base\InvalidConfigException;
use yii\validators\EmailValidator;


class Phone extends FormatAbstract
{

    /**
     * @var string the phone
     */
    public $phone;

    /**
     * @return string
     */
    public function getText()
    {
        return "TEL:{$this->phone}";
    }
}