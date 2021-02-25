<?php
use app\models\Posts;
?>
<?php foreach($searchDb as $item): ?>
    <h2><?= Posts::find()->where(['id'=>$item['postId']])->one()->title ?></h2>
    <h4><?=$item['name']?> - <?=$item['email']?></h4>
    <span><?=$item['body']?></span>
    <hr>
<?php endforeach; ?>
