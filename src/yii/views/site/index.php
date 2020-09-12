<?php

/* @var $this yii\web\View */

$this->title = 'Cookie reverse proxy Example';
?>
<script>
    function onClickCokie(){
        document.cookie = 'target=testing';
    }
</script>
<div class="site-index">

    <div class="jumbotron">
        <h1>Index Page</h1>
        <!-- <p class="lead">Index Page</p> -->
        <p><a class="btn btn-lg btn-success" onclick="onClickCokie()">set cookie</a></p>
        <div><?php 
        var_dump($_COOKIE);
        ?></div>
    </div>
</div>
