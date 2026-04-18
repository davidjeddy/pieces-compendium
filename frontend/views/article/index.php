<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = env('APP_NAME' ) . ': ' . Yii::t('frontend',
    \davidjeddy\articlecategory\models\ArticleCategory::findOne([
            'id' => \Yii::$app->request->queryParams['category_id']
    ])->title
);
?>
<div id="article-index">
    <h1><?php echo Yii::t('frontend', 'Articles') ?></h1>
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider,
        'pager'=>[
            'hideOnSinglePage'=>true,
        ],
        'itemView'=>'_item',
        'showOnEmpty'=>false,
    ]); ?>
</div>