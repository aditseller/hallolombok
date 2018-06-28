<?php

namespace app\controllers;

use Yii;
use app\models\Package;
use app\models\PackageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\User;
use app\components\AccessRule;
use yii\filters\AccessControl;
use  yii\behaviors\SluggableBehavior;
use yii\web\UploadedFile;
use yii\imagine\Image;
/**
 * PackageController implements the CRUD actions for Package model.
 */
class PackageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
			
			'access' => [
                'class' => AccessControl::className(),
				'ruleConfig' => [
                       'class' => AccessRule::className(),
					   
                   ],
                'only' => ['index','create','update'],
                'rules' => [
                    [
                        'actions' => ['index','create','update'],
                        'allow' => true,
                        'roles' => [User::ROLE_ADMIN],
                    ],
					
                ],
            ],
			
			    [
            'class' => SluggableBehavior::className(),
            'attribute' => 'url',
            'slugAttribute' => 'slug',
			
			
			
          ],
        ];
    }
	
	  //Sluggable function
    public function actionSlug($slug) {
   $model = Package::find()->where(['url'=>$slug])->one();
		if (!is_null($model)) {
       return $this->render('view', [
           'model' => $model,
       ]);
   } else {
     return $this->render('404',['exception'=>Yii::$app->errorHandler->exception]);
   }
 }

    /**
     * Lists all Package models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PackageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Package model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Package model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Package();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			$model->image = UploadedFile::getInstance($model,'image');
          $model->image->saveAs('public/img/'.sha1($model->id_package).'.jpg');


              //Create Thumbnail Image and Resize
       Image::thumbnail('public/img/'.sha1($model->id_package).'.jpg',640,480)->save('public/img/'.sha1($model->id_package).'.jpg');
            return $this->redirect(['index']);
        } else {

        return $this->render('create', [
            'model' => $model,
        ]);
    }
	}

    /**
     * Updates an existing Package model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_package]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Package model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Package model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Package the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Package::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
