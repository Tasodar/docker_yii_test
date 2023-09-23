<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>
<?php
    $flashMessages = Yii::$app->session->getAllFlashes();
    if ($flashMessages) {
        echo '<ul class="flashes">';
        foreach($flashMessages as $key => $messages) {
            foreach($messages as $message) {
                echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
            }
        }
        echo '</ul>';
    }
?>
<h1>Add news</h1>

<?php $form = ActiveForm::begin(); ?>
    <?php echo $form->field($model, 'title'); ?>
    <?php echo $form->field($model, 'description'); ?>
    <?php echo $form->field($model, 'body')->textarea() ; ?>
    <?php echo $form->field($model, 'profile_id')->dropDownList($userList); ?>

<?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

<?php $form = ActiveForm::end(); ?>
