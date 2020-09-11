<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<script>
    function onClickCokie(){
        document.cookie = 'target=1';
    }
</script>
<div class="site-index">

    <div class="jumbotron">
        <h1>Cookie reverse proxy sample</h1>
        <p class="lead">Index Page</p>
        <p><a class="btn btn-lg btn-success" onclick="onClickCokie()">set cookie</a></p>
    </div>
</div>
