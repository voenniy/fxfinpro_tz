<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php if(Yii::app()->user->hasFlash('info')):?>
    <div class="alert alert-info">
		<?php echo Yii::app()->user->getFlash('info'); ?>
	</div>
<?php endif; ?>
<div class="row">
    <div class="offset9 span3">
    <a href="/site/updateq" class="btn btn-primary">Обновить данные</a>
    </div>
</div>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'quotes',
    'dataProvider' => $quotes,
    'cssFile' => false,
    'itemsCssClass' => 'table table-striped table-hover',
    'pagerCssClass' => 'pagination',
    'pager' => [
        'selectedPageCssClass' => 'active',
        'hiddenPageCssClass' => 'disabled',
        'header' => '',
        'htmlOptions' => [
            'class' => false
        ]
    ],
    'htmlOptions' => [
        'class' => 'span10 offset1'
    ]

    ));
/*$this->widget('zii.widgets.CListView', array(
    'id' => 'quotes',
    'itemView' => '_quote',
    'dataProvider' => $quotes));
*/?>
