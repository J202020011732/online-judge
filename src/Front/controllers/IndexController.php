<?php

namespace app\controllers;

use app\models\User;

class IndexController extends BaseController {

    public function actionIndex() {
        $users = User::find()
            ->select('username, solved_problem')
            ->orderBy('solved_problem DESC, total_submit, username')
            ->limit(10)
            ->all();

        $this->smarty->assign('users', $users);
        $this->smarty->display('index.html');
    }

    public function actionError() {
        return $this->smarty->display('common/error.html');
    }
}