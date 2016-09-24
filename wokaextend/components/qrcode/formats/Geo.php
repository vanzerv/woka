<?php

namespace wokaextend\components\qrcode\formats;

use yii\base\InvalidConfigException;
use yii\validators\EmailValidator;


class Geo extends FormatAbstract
{
    public $lat;
    public $lng;
    public $altitude;

    /**
     * @inheritdoc
     */
    public function getText()
    {
        return "GEO:{$this->lat},{$this->lng},{$this->altitude}";
    }
}