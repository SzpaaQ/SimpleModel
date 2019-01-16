<?php
/**
 * @author Łukasz Szpak ( szpaaaaq@gmail.com )
 * @Copyright 2018 SzpaQ
 * @license ALL RIGHTS RESERVED
 * */

require_once 'self_stand/Model.php';
class Users extends Model {
    public function initialize()
    {
        $this->hasMany('user_id', 'Task');
    }
}
class Task extends Model {
    public function initialize()
    {

    }
}

Model::_setDB(array(
    'host' => 'localhost',
    'name' => 'dev_crm',
    'user' => 'szpak',
    'pass' => 'x',
    'charset' => 'utf8',
    'prefix' => 'sh_',
));

Model::transaction();
$user = Users::findFirst(2);
$task = new Task;
$task->save();
$user -> username = 'SzpaQQ';
$user->save();
Model::commit(); // Transaction won't be committed since task wont be save. It suppose to have few properties like user_id, name
