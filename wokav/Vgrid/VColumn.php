<?php

namespace wokav\Vgrid;

use Closure;
use yii\base\Object;
use yii\helpers\Html;


class VColumn extends Object
{
    /**
     * @var GridView的网格视图对象
     */
    public $grid;
    /**
     * @var 字符串标题单元格内容
     */
    public $header;
    /**
     * @var 字符串页脚内容
     */
    public $footer;
    /**
     * @var 表格内容
     */
    public $content;
    /**
     * @var 设置当前行列是否可见,默认可见
     */
    public $visible = true;
    /**
     * @var 阵列组列标签的HTML属性。
     * @see \yii\helpers\Html::renderTagAttributes()  属性被呈现的细节.
     */
    public $options = [];
    /**
     * @var table头部规则
     * @see \yii\helpers\Html::renderTagAttributes() 属性被呈现的细节.
     */
    public $headerOptions = [];
    /**
     * @var table content内容
     * @see \yii\helpers\Html::renderTagAttributes() 属性被呈现的细节
     */
    public $contentOptions = [];
    /**
     * @var footer
     * @see \yii\helpers\Html::renderTagAttributes() 属性被呈现的细节
     */
    public $footerOptions = [];
    /**
     * @var filter 检索规则
     * @see \yii\helpers\Html::renderTagAttributes() 属性被呈现的细节
     */
    public $filterOptions = [];
    /**
     * 渲染头部单元格。
     */
    public function renderHeaderCell()
    {
        return Html::tag('th', $this->renderHeaderCellContent(), $this->headerOptions);
    }

    /**
     * 渲染页脚单元格。
     */
    public function renderFooterCell()
    {
        
        return Html::tag('td', $this->renderFooterCellContent(), $this->footerOptions);
    }

    /**
     * 渲染数据体单元格。
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
     * 渲染检索条件单元格。
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
