<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Mentor */

$this->title = Yii::t('app', 'Create Mentor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mentors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
