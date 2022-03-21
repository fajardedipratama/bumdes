<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%setoran_kios}}".
 *
 * @property int $id
 * @property string $nama_setoran
 * @property string|null $tgl_setoran
 */
class SetoranKios extends \yii\db\ActiveRecord
{
    public $tahun;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%setoran_kios}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_setoran'], 'required'],
            [['tgl_setoran'], 'safe'],
            [['nama_setoran'], 'string', 'max' => 100],
            [['tahun'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_setoran' => 'Judul Setoran',
            'tgl_setoran' => 'Tanggal Setoran',
            'tahun' => 'Tahun',
        ];
    }

    public function beforeSave($options = array()) {
        if($this->isNewRecord){
            $this->tgl_setoran = date('Y-m-d');
        }
        return true;
    }
}
