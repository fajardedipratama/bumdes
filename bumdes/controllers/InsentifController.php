<?php

namespace app\controllers;
use Yii;
use app\models\Insentif;
use app\models\InsentifDetail;
use app\models\search\InsentifSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * InsentifController implements the CRUD actions for Insentif model.
 */
class InsentifController extends Controller
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
     * Lists all Insentif models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Insentif();
        $searchModel = new InsentifSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if ($model->load($this->request->post())) {
            $model->tgl_insentif=Yii::$app->formatter->asDate($model->tgl_insentif,'yyyy-MM-dd');
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
     * Displays a single Insentif model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $newmodel = new InsentifDetail();
        $model = $this->findModel($id);

        if ($newmodel->load($this->request->post())) {
            $newmodel->insentif_id = $id;
            $newmodel->tgl_insentif = $model->tgl_insentif;
            $newmodel->save();
            return $this->redirect(['view', 'id' => $id]);
        }

        return $this->render('view', [
            'newmodel' => $newmodel,
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Insentif model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Insentif();

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
     * Updates an existing Insentif model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            $model->tgl_insentif=Yii::$app->formatter->asDate($model->tgl_insentif,'yyyy-MM-dd');
            $model->save();
            if($model->save()){
                Yii::$app->db->createCommand()->update('id_insentif_detail',
                ['tgl_insentif' => $model->tgl_insentif],
                ['insentif_id' => $model->id])->execute();
            }
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Insentif model.
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
     * Finds the Insentif model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Insentif the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Insentif::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
