<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;

?>
<hr/>
<div class="article-item row">
    <div class="col-xs-12">
        <?php if (strstr(\Yii::$app->request->url, '/article/index?category_id=1') && $model->thumbnail_path) { ?>
            <div class="article-content">
                <?php echo Html::a(
                    Html::img(
                        Yii::$app->glide->createSignedUrl([
                            'glide/index',
                            'path' => $model->thumbnail_path,
                            'w'    => 400,
                        ], true),
                        ['class' => 'article-thumb img-responsive img-rounded pull-left']
                    ),
                    ['view', 'slug'=>$model->slug]
                ); ?>
            </div>
        <?php } else { ?>
            <h2 class="article-title">
                <?php echo Html::a($model->title, ['view', 'slug'=>$model->slug]) ?>
            </h2>
            <div class="article-content">
                <?php if ($model->thumbnail_path): ?>
                    <?php echo Html::a(
                        Html::img(
                            Yii::$app->glide->createSignedUrl([
                                'glide/index',
                                'path' => $model->thumbnail_path,
                                'w'    => 100,
                            ], true),
                            ['class' => 'article-thumb img-responsive img-rounded pull-left']
                        ),
                        ['view', 'slug'=>$model->slug]
                    ); ?>
                <?php endif; ?>
            </div>
        <?php }; ?>
    </div>
</div>
