<?php
/** @var yii\web\View $this */
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

<h1>main/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
