<?php

namespace app\controllers;
use Yii;
use app\models\Kios;
use app\models\KiosKontrak;
use app\models\search\Kios as KiosSearch;
use app\models\search\Kiosnonaktif as KiosnonaktifSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

/**
 * KiosController implements the CRUD actions for Kios model.
 */
class KiosController extends Controller
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
     * Lists all Kios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KiosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionNonaktif()
    {
        $searchModel = new KiosnonaktifSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('nonaktif', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kios model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->akhir_sewa=Yii::$app->formatter->asDate($model->akhir_sewa,'yyyy-MM-dd');
            Yii::$app->db->createCommand()->update('id_kios',
                ['akhir_sewa' => $model->akhir_sewa],
                ['id' => $id])->execute();

            return $this->redirect(['nonaktif']);
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Kios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Kios();
        $model2 = new KiosKontrak();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->awal_sewa=Yii::$app->formatter->asDate($model->awal_sewa,'yyyy-MM-dd');
                $model->akhir_sewa=date('Y-m-d', strtotime('+365 days', strtotime($model->awal_sewa)));;
                $model->save();

                if($model->save()){
                    $model2->kios_id = $model->id;
                    $model2->awal_kontrak = $model->awal_sewa;
                    $model2->akhir_kontrak = $model->akhir_sewa;
                    $model2->tagihan = $model->biaya_sewa;
                    $model2->save();
                }

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
     * Updates an existing Kios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load($this->request->post())) {
            $model->awal_sewa=Yii::$app->formatter->asDate($model->awal_sewa,'yyyy-MM-dd');
            $model->akhir_sewa=Yii::$app->formatter->asDate($model->akhir_sewa,'yyyy-MM-dd');
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionPerpanjang($id)
    {
        $model = $this->findModel($id);
        $model2 = new KiosKontrak();

        if ($model->load($this->request->post())) {
            
            $model2->kios_id = $model->id;
            $model2->awal_kontrak = $model->akhir_sewa;
            $model2->akhir_kontrak = date('Y-m-d',strtotime('+365 days',strtotime($model->akhir_sewa)));
            $model2->tagihan = $model->biaya_sewa;
            $model2->save();

            if($model2->save()){
                Yii::$app->db->createCommand()->update('id_kios',
                [
                    'akhir_sewa' => $model2->akhir_kontrak,
                    'biaya_sewa' => $model->biaya_sewa,
                ],
                ['id' => $id])->execute();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('perpanjang', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kios model.
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
     * Finds the Kios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Kios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
