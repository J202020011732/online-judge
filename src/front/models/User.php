<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord {
    public static function tableName() {
        return "{{%user}}";
    }

    public static function findByUsername($username) {
        return self::find()
            ->select('*')
            ->where('username=:username', [':username' => $username])
            ->one();
    }

    public static function findById($id) {
        return self::find()
            ->select("*")
            ->where("id=:id", [":id" => $id])
            ->one();
    }

    public static function addTotalSubmit($id) {
        $user = self::findById($id);
        $user->total_submit = $user->total_submit + 1;
        $user->update();
    }
}