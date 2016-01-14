<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MentorEntrepreneur */

$this->title = Yii::t('app', 'Create Mentor Entrepreneur');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mentor Entrepreneurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentor-entrepreneur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
