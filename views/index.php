<?php $this->layout('template', ['title' => 'User Profile']) ?>

<h1>User Profile</h1>
<p>Hello, <?= $this->e($name) ?></p>

<form action="/" method="POST">
    <input type="hidden" name="token" value="<?= $this->e($token) ?>"/>
    <input type="submit" value="Send"/>
</form>