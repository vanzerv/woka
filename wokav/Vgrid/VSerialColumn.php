<?php

namespace wokav\Vgrid;

/**
 * 序列化数据列
 */
class VSerialColumn extends VColumn
{
    /**
     * @inheritdoc
     */
    public $header = 'WV';

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {    
        $pagination = $this->grid->dataProvider->getPagination();
        if ($pagination !== false) {
            return $pagination->getOffset() + $index + 1;
        } else {
            return $index + 1;
        }
    }
}
