<?php
/**
 * Created by PhpStorm.
 * User: roy
 * Date: 5/31/2016
 * Time: 3:30 PM
 */
namespace app\controllers;

use app\models\Article;
use app\models\Category;
use Yii;
use yii\web\Controller;


class HomeController extends Controller{

    /*自定义父模板*/
    public $layout = 'home';

    public function actionIndex(){

        /*查询数据*/
        $request = Yii::$app->request;
        $id = $request->get('id',0);
        /*占位符，防止恶意sql语句; 例如： 1=1 或者 ;drop table article;*/
        $sql = 'select * from article where id =:id';
        $result = Article::findBySql($sql,[':id'=>$id])->all();
        /*查询一个*/
        $data = Article::find()->where(['id'=>3])->one();
        /*ip 主键*/
        $data = Article::findOne(3);
        /*查询第三，四，五条*/
        $data = Article::findAll([3,4,5]);
        /*查询所有*/
        $data = Article::find()->where(['id'=>3])->all();
        /*大于等于*/
        $data = Article::find()->where(['>=','id',3])->all();
        /*范围*/
        $data = Article::find()->where(['between','id',2,4])->all();
        /*title like "xxx"*/
        $data = Article::find()->where(['like','title','1'])->all();
        /*转成数组*/
        $data = Article::find()->where(['like','title','1'])->asArray()->all();
        /*batch 每次取2个数据*/
        foreach(Article::find()->batch(2) as $article){
            $data[] = $article;
        }


        /*添加数据*/
/*        $article = new Article();
        $article->title = '88888';
        $article->num = '5';
        $result = $article->insert();
        $result = $article->save();
//        当前id
        $id = $article->attributes['id'];*/

        /*更新数据*/
/*        $article = Article::findOne(8);
        $article->title = 'vr2';
//        $status = $article->update();
//        counter++, id = 8
        Article::updateAllCounters(['num'=>1],['id'=>8]);
        $status = $article->save();*/

        /*删除数据*/
/*        $article = Article::findOne(7);
        $article = Article::find()->where(['id'=>7])->one();*/
/*        $article = Article::find()->where(['id'=>7])->all();
        $article = $article[0];*/
//        $status = $article->delete();
        /*另一种删除*/
        /*使用占位符,防SQL注入*/
//        Article::deleteAll('id=:id And num < :num',[':id'=>$id,':num'=>100]);


        /*一对多查询*/
        $category = Category::findOne('1');
        $articles = $category->getArticles();
//        $articles = Article::find()->where(['cate_id'=>$category->attributes['id']])->all();
        /*关联模型的完整路径，关联关系*/
//        $articles = $category->hasMany('app\models\Article',['cate_id'=>'id'])->all();
//        $articles = $category->hasMany(Article::className(),['cate_id'=>'id'])->all();
//        p($articles);


        /*一对一查询*/
        $article = Article::findOne(4);
        /*目标 => 自己*/
//        $category = $article->hasOne('app\models\Category',['id'=>'cate_id'])->asArray()->all();
        $category = $article->getCategory();



        /*渲染父，子模板*/
        return $this->render('index');
    }



    public function actionTest1(){
/*        $request = Yii::$app->request;
        $id = $request->get('id',1);
        $username = $request->post('username','roy');
        $type = $request->isGet;
        $type = $request->isPost;
        $user_ip = $request->userIP;*/


        /*compact方法生成数组*/
/*        $user = [
            'username' => 'cba',
        ];
        $article = [
            'title' => 'abc'
        ];
        $data = compact('user', $article);*/


        /*过滤html标签*/
/*        $data = [
            'str'=>'hello world <script>alert(1)</script>',
        ];
        return $this->renderPartial('index',$data);*/

    }
}