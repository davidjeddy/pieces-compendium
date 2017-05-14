<?php

use dosamigos\disqus\Comments;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

?>
<div class="content">
    <article class="article-item">

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
    if ($model->category_id === 1) {
        $prev = $model->getNextOrPrev($model->category_id, $model->published_at, 'DESC', 'published_at');
        $next = $model->getNextOrPrev($model->category_id, $model->published_at, 'ASC',  'published_at');
        ?>

        <div class="row">
            <div class="col-xs-3 text-left"><?php if (!empty($prev)) { ?><h2><a href="<?php echo ($prev['slug'] ? $prev['slug'] : NULL); ?>" class="prevnext">Prev.</a></h2><?php } ?></div>
            <div class="col-xs-6 text-center"></div>
            <div class="col-xs-3 text-right"><?php if (!empty($next)) { ?><h2><a href="<?php echo ($next['slug'] ? $next['slug'] : NULL); ?>" class="prevnext">Next</a></h2><?php } ?></div>
        </div>
    <?php }; ?>

    <?php echo Comments::widget([
        // see http://help.disqus.com/customer/portal/articles/472098-javascript-configuration-variables
        'identifier' => env('FRONTEND_HOST_INFO') .'/' . $_SERVER['REQUEST_URI'],
        'shortname'  => 'pieces-compendium',
    ]); ?>
</div>