<?php

namespace wokav\Vgrid;

use Closure;
use yii\base\Object;
use yii\helpers\Html;


class VColumn extends Object
{
    /**
     * @var GridView��������ͼ����
     */
    public $grid;
    /**
     * @var �ַ������ⵥԪ������
     */
    public $header;
    /**
     * @var �ַ���ҳ������
     */
    public $footer;
    /**
     * @var �������
     */
    public $content;
    /**
     * @var ���õ�ǰ�����Ƿ�ɼ�,Ĭ�Ͽɼ�
     */
    public $visible = true;
    /**
     * @var �������б�ǩ��HTML���ԡ�
     * @see \yii\helpers\Html::renderTagAttributes()  ���Ա����ֵ�ϸ��.
     */
    public $options = [];
    /**
     * @var tableͷ������
     * @see \yii\helpers\Html::renderTagAttributes() ���Ա����ֵ�ϸ��.
     */
    public $headerOptions = [];
    /**
     * @var table content����
     * @see \yii\helpers\Html::renderTagAttributes() ���Ա����ֵ�ϸ��
     */
    public $contentOptions = [];
    /**
     * @var footer
     * @see \yii\helpers\Html::renderTagAttributes() ���Ա����ֵ�ϸ��
     */
    public $footerOptions = [];
    /**
     * @var filter ��������
     * @see \yii\helpers\Html::renderTagAttributes() ���Ա����ֵ�ϸ��
     */
    public $filterOptions = [];
    /**
     * ��Ⱦͷ����Ԫ��
     */
    public function renderHeaderCell()
    {
        return Html::tag('th', $this->renderHeaderCellContent(), $this->headerOptions);
    }

    /**
     * ��Ⱦҳ�ŵ�Ԫ��
     */
    public function renderFooterCell()
    {
        
        return Html::tag('td', $this->renderFooterCellContent(), $this->footerOptions);
    }

    /**
     * ��Ⱦ�����嵥Ԫ��
     * @param mixed $model the data model being rendered
     * @param mixed $key the key associated with the data model
     * @param integer $index the zero-based index of the data item among the item array returned by [[GridView::dataProvider]].
     * @return string the rendering result
     */
    public function renderDataCell($model, $key, $index)
    {      
        if ($this->contentOptions instanceof Closure) {
            $options = call_user_func($this->contentOptions, $model, $key, $index, $this);
        } else {
            $options = $this->contentOptions;
        }
        return Html::tag('td', $this->renderDataCellContent($model, $key, $index), $options);
    }
    /**
     * ��Ⱦ����������Ԫ��
     */
    public function renderFilterCell()
    {
        
        return Html::tag('td', $this->renderFilterCellContent(), $this->filterOptions);
    }

    protected function renderHeaderCellContent()
    {
        
        return trim($this->header) !== '' ? $this->header : $this->grid->emptyCell;
    }
 
    protected function renderFooterCellContent()
    {
        return trim($this->footer) !== '' ? $this->footer : $this->grid->emptyCell;
    }

    protected function renderDataCellContent($model, $key, $index)
    {
        
        if ($this->content !== null) {
            return call_user_func($this->content, $model, $key, $index, $this);
        } else {
            return $this->grid->emptyCell;
        }
    }

    protected function renderFilterCellContent()
    {
        return $this->grid->emptyCell;
    }
}
