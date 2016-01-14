<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\UnifyAsset;
use common\widgets\Alert;

UnifyAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign-up Page</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
  <!--=== Header ===-->
  <div class="header">
      <div class="container">
          <!-- Logo -->
          <a class="logo" href="<?=Url::to(['site/profile'])?>">
              <img src="unify/img/TUBELOGO.png" alt="Logo">
          </a>

          <!-- End Logo -->

          <!-- Topbar -->
          <!-- End Topbar -->

          <!-- Toggle get grouped for better mobile display -->

          <!-- End Toggle -->
      </div><!--/end container-->

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
          <div class="container">
          </div><!--/end container-->
      </div><!--/navbar-collapse-->
  </div>
  <!--=== End Header ===-->
        <?= $content ?>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; 9Teraju EDEC XCLUSIVE <?= date('Y') ?></p>


        </div>
    </footer>
</div>
<?php $this->endBody() ?>
<script type="text/javascript">
    // jQuery(document).ready(function() {
    //     App.init();
    //     App.initCounter();
    //     App.initScrollBar();
    //     Datepicker.initDatepicker();
    //     });


</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->
</body>
</html>
<?php $this->endPage() ?>
