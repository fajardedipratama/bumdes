<?php

namespace app\controllers;
use Yii;
use app\models\Laporan;
use app\models\search\LaporanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * LaporanController implements the CRUD actions for Laporan model.
 */
class LaporanController extends Controller
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
     * Lists all Laporan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Laporan();
        $searchModel = new LaporanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($model->load($this->request->post())) {
            $model->tgl_awal=Yii::$app->formatter->asDate($model->tgl_awal,'yyyy-MM-dd');
            $model->tgl_akhir=Yii::$app->formatter->asDate($model->tgl_akhir,'yyyy-MM-dd');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Laporan model.
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

    public function actionPrint($id)
    {
        $model = $this->findModel($id);
        return $this->renderPartial('print',[
            'model'=>$model,
        ]);
    }

    /**
     * Creates a new Laporan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Laporan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->tgl_awal=Yii::$app->formatter->asDate($model->tgl_awal,'yyyy-MM-dd');
                $model->tgl_akhir=Yii::$app->formatter->asDate($model->tgl_akhir,'yyyy-MM-dd');
                $model->save();
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Laporan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->tgl_awal=Yii::$app->formatter->asDate($model->tgl_awal,'yyyy-MM-dd');
            $model->tgl_akhir=Yii::$app->formatter->asDate($model->tgl_akhir,'yyyy-MM-dd');
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionFinishreport($id,$dana)
    {
        $model = $this->findModel($id);

        Yii::$app->db->createCommand()->update('id_laporan',
        ['dana' => $dana],
        ['id' => $id])->execute();

        return $this->redirect(['print', 'id' => $model->id]);
    }

    /**
     * Deletes an existing Laporan model.
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
     * Finds the Laporan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Laporan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Laporan::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
