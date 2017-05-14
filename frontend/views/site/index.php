<?php

use dosamigos\disqus\Comments;

/* @var $this yii\web\View */
$this->title = Yii::$app->name;
$model = \common\models\Article::findOne(['id' => 45]);
?>
<div class="site-index">

    <?php /*
    <?php
    echo \common\widgets\DbCarousel::widget([
        'key'     => 'index',
        'options' => ['class' => 'slide'],  // enables slide effect
    ]);
    ?>

    <div class="jumbotron">
        <h1>Pieces...</h1>

        <p class="lead">...a story of savage obedience in the heart of the civilized world.</p>

        <?php
        echo common\widgets\DbMenu::widget([
            'key'     => 'frontend-index',
            'options' => ['tag'=>'p']
        ]);
        ?>

    </div>


    /* @var $this yii\web\View */
    /* @var $model common\models\Article */
    // $this->params['breadcrumbs'][] = ['label' => Yii::t('frontend', 'Articles'), 'url' => ['index']];
    /* $articleCategory = \davidjeddy\articlecategory\models\ArticleCategory::find()
        ->andWhere(['id' => $model->category_id])
        ->one();

    $this->params['breadcrumbs'][] = [
        'label' => Yii::t('frontend', $articleCategory->title),
        'url'   => \yii\helpers\Url::to(['article/index', 'category_id' => $articleCategory->id]),
    ];
    $this->params['breadcrumbs'][] = $model->title;
    */ ?>

    <div class="content">
        <article class="article-item">
            <h1><?php // echo $model->title ?></h1>

            <?php /* if (isset($model->thumbnail_path)) { ?>
            <?php echo \yii\helpers\Html::img(
                Yii::$app->glide->createSignedUrl([
                    'glide/index',
                    'path' => $model->thumbnail_path,
                    'w' => 200
                ], true),
                ['class' => 'article-thumb img-rounded pull-left']
            ) ?>
        <?php }; */ ?>

            <?php echo $model->body ?>

            <?php if (!empty($model->articleAttachments)): ?>
                <h3><?php echo Yii::t('frontend', 'Attachments') ?></h3>
                <ul id="article-attachments">
                    <?php foreach ($model->articleAttachments as $attachment): ?>
                        <li>
                            <?php echo \yii\helpers\Html::a(
                                $attachment->name,
                                ['attachment-download', 'id' => $attachment->id])
                            ?>
                            (<?php echo Yii::$app->formatter->asSize($attachment->size) ?>)
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </article>

        <?php
        /**
         * only show prev/next for 'comic's
         * @source  https://github.com/davidjeddy/pieces-compendium/issues/2
         * @todo  bas this off the category title, not id? - DJE - 2015-11-29
         */
        if ($model->category_id === 1 ) {
            $prev = $model->getNextOrPrev($model->category_id, $model->published_at, 'DESC', 'published_at');
            $next = $model->getNextOrPrev($model->category_id, $model->published_at, 'ASC',  'published_at');
            ?>

            <div class="row">
                <div class="col-xs-3 text-left"><?php if (!empty($prev)) { ?><h2><a href="../article/<?php echo ($prev['slug'] ? $prev['slug'] : NULL); ?>" class="prevnext">Prev.</a></h2><?php } ?></div>
                <div class="col-xs-6 text-center"></div>
                <div class="col-xs-3 text-right"><?php if (!empty($next)) { ?><h2><a href="../article/<?php echo ($next['slug'] ? $next['slug'] : NULL); ?>" class="prevnext">Next</a></h2><?php } ?></div>
            </div>
        <?php }; ?>

        <?php echo Comments::widget([
            // see http://help.disqus.com/customer/portal/articles/472098-javascript-configuration-variables
            'identifier' => substr($_SERVER['FRONTEND_URL'], 0, -1).$_SERVER['REQUEST_URI'],
            'shortname'  => 'pieces-compendium',
        ]); ?>
    </div>
</div>
