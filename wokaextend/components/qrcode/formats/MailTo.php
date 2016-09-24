<?php
namespace wokaextend\components\qrcode\formats;

use dosamigos\qrcode\traits\EmailTrait;
use yii\base\InvalidConfigException;
use yii\validators\EmailValidator;


class MailTo extends FormatAbstract
{
    use EmailTrait;

    /**
     * @inheritdoc
     */
    public function getText()
    {
        return "MAILTO:{$this->email}";
    }
}