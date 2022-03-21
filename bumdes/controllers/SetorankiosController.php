<?php

namespace app\controllers;
use Yii;
use app\models\Kios;
use app\models\SetoranKios;
use app\models\SetoranKiosDetail;
use app\models\search\SetorankiosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SetorankiosController implements the CRUD actions for SetoranKios model.
 */
class SetorankiosController extends Controller
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
     * Lists all SetoranKios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new SetoranKios();
        $searchModel = new SetorankiosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view','id'=>$model->id]);
        }

        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    // public function actionLaporan()
    // {
    //     $model = new SetoranKios();
    //     if ($model->load($this->request->post())){
    //         return $this->redirect(['/setorankios/laporan','tahun'=>$model->tahun]);
    //     }

    //     return $this->render('laporan',[
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Displays a single SetoranKios model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new SetoranKiosDetail();
        if ($model->load($this->request->post())) {
            $result = Kios::find()->where(['id'=>$model->kios_id])->one();
            $result2 = SetoranKios::find()->where(['id'=>$id])->one();

            $model->setoran_id = $id;
            $model->tgl_setoran = $result2->tgl_setoran;
            $model->tagihan = $result->biaya_sewa;
            $model->save();
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('view', [
            'viewmodel' => $this->findModel($id),
            'model' => $model,
        ]);
    }

    /**
     * Creates a new SetoranKios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SetoranKios();

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
     * Updates an existing SetoranKios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->tgl_setoran=Yii::$app->formatter->asDate($model->tgl_setoran,'yyyy-MM-dd');
            $model->save();
            if($model->save()){
                Yii::$app->db->createCommand()->update('id_setoran_kios_detail',
                ['tgl_setoran' => $model->tgl_setoran],
                ['setoran_id' => $model->id])->execute();
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SetoranKios model.
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
     * Finds the SetoranKios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SetoranKios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SetoranKios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
