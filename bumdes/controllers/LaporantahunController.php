<?php

namespace app\controllers;
use Yii;
use app\models\Laporan;
use app\models\LaporanBagian;
use app\models\LaporanTahun;
use app\models\search\LaporantahunSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * LaporantahunController implements the CRUD actions for LaporanTahun model.
 */
class LaporantahunController extends Controller
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
     * Lists all LaporanTahun models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LaporantahunSearch();
        $model = new LaporanTahun();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LaporanTahun model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelform = new LaporanBagian();

        if ($modelform->load($this->request->post())) {
            $total = Laporan::find()->where(['tahun'=>$model->tahun])->orderBy(['bulan'=>SORT_DESC])->limit(1)->one(); 
            $modelform->tahun_id = $id;
            if($modelform->jenis === 'Persentase'){
                $modelform->nominal = ($total->dana*$modelform->nilai)/100;
            }else{
                $modelform->nominal = $modelform->nilai;
            }
            $modelform->save();
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('view', [
            'model' => $model,
            'modelform' => $modelform,
        ]);
    }
    public function actionPrint($id)
    {
        $model = $this->findModel($id);
        return $this->renderPartial('print', ['model' => $model]);
    }

    /**
     * Creates a new LaporanTahun model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new LaporanTahun();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
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
     * Updates an existing LaporanTahun model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionFinishreport($id,$dana)
    {
        $model = $this->findModel($id);

        Yii::$app->db->createCommand()->update('id_laporan_tahun',
        ['dana' => $dana],
        ['id' => $id])->execute();

        return $this->redirect(['print', 'id' => $model->id]);
    }

    /**
     * Deletes an existing LaporanTahun model.
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
     * Finds the LaporanTahun model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LaporanTahun the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaporanTahun::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
