<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-9">
            <h2>Поиск по комментариям </h2>


                <div class="form-row align-items-center">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputSearch" placeholder="От 3х символов">
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary" id="search">Искать</button>
                    </div>
                </div>
            <div class="searchOut">

            </div>

        </div>
        <div class="col-md-3">
            Всего записей: <b id="countPosts"><?=$countPosts?></b><br>
            Всего комментарий: <b id="countComments"><?=$countComments?></b><br>
            <button class="btn btn-secondary" id="upload">Загрузить</button>
            <br>
            <br>
            <div class="messageUpload">

            </div>
        </div>
    </div>
</div>
