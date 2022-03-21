<?php

namespace app\controllers;
use Yii;
use app\models\Mobil;
use app\models\MobilSewa;
use app\models\search\MobilsewaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

/**
 * MobilsewaController implements the CRUD actions for MobilSewa model.
 */
class MobilsewaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access'=> [
                'class'=>AccessControl::className(),
                'only'=>['create','index','update','view'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MobilSewa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MobilsewaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        $mobil = ArrayHelper::map(Mobil::find()->all(),'id',
        function($data){
            return $data['merek'].' ('.$data['nopol'].')';
        });

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'mobil'=>$mobil,
        ]);
    }

    /**
     * Displays a single MobilSewa model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MobilSewa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MobilSewa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->tgl_sewa=Yii::$app->formatter->asDate($model->tgl_sewa,'yyyy-MM-dd');
                $model->tgl_selesai=Yii::$app->formatter->asDate($model->tgl_selesai,'yyyy-MM-dd');
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MobilSewa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->tgl_sewa=Yii::$app->formatter->asDate($model->tgl_sewa,'yyyy-MM-dd');
            $model->tgl_selesai=Yii::$app->formatter->asDate($model->tgl_selesai,'yyyy-MM-dd');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MobilSewa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MobilSewa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MobilSewa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MobilSewa::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
