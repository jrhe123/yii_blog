<?php
/**
 * Created by PhpStorm.
 * User: roy
 * Date: 6/1/2016
 * Time: 2:06 PM
 */
namespace app\models;

use yii\db\ActiveRecord;

class Article extends ActiveRecord{

    public function getCategory(){
        $category = $this->hasOne('app\models\Category',['id'=>'cate_id'])->asArray()->all();
        return $category;
    }
}