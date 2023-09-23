<?php

use app\assets\CustomAsset;
use yii\helpers\Html;

CustomAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="logo">
    <img src="/img/gear01.png" alt="logo">
</div>
<header>
    <a href="/main/list">список</a>
    <a href="/main/add">добавить</a>
    <a href="#">запасной</a>
</header>

<div class="content">
    <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
