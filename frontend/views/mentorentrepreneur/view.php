<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MentorEntrepreneur */

$this->title = $model->mentor_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mentor Entrepreneurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentor-entrepreneur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'mentor_id' => $model->mentor_id, 'entrepreneur_id' => $model->entrepreneur_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'mentor_id' => $model->mentor_id, 'entrepreneur_id' => $model->entrepreneur_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'mentor_id',
            'entrepreneur_id',
        ],
    ]) ?>

</div>
