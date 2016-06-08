<?php
/**
 * Created by PhpStorm.
 * User: roy
 * Date: 6/1/2016
 * Time: 3:48 PM
 */

namespace app\models;


use \yii\db\ActiveRecord;

class Category extends ActiveRecord{

    public function getArticles(){

        $articles = $this->hasMany(Article::className(),['cate_id'=>'id'])->asArray()->all();
        return $articles;
    }

}