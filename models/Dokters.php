<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dokters".
 *
 * @property string $id
 * @property string $id_poliklinik
 * @property string $nama_dokter
 * @property string $spesialis
 * @property string $alamat
 * @property string $nomor_telepon
 *
 * @property Polis $poliklinik
 * @property RekamMedis[] $rekamMedis
 */
class Dokters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_poliklinik', 'nama_dokter', 'spesialis', 'alamat', 'nomor_telepon'], 'required'],
            [['id_poliklinik', 'nama_dokter', 'spesialis', 'alamat', 'nomor_telepon'], 'string', 'max' => 255],
            [['id_poliklinik'], 'exist', 'skipOnError' => true, 'targetClass' => Polis::class, 'targetAttribute' => ['id_poliklinik' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_poliklinik' => 'Id Poliklinik',
            'nama_dokter' => 'Nama Dokter',
            'spesialis' => 'Spesialis',
            'alamat' => 'Alamat',
            'nomor_telepon' => 'Nomor Telepon',
        ];
    }

    /**
     * Gets query for [[Poliklinik]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliklinik()
    {
        return $this->hasOne(Polis::class, ['id' => 'id_poliklinik']);
    }

    public function getPoliklinikList()
    {
        return Polis::find()->select(['nama_poliklinik', 'id'])->indexBy('id')->column();
    }

    /**
     * Gets query for [[RekamMedis]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getRekamMedis()
    // {
    //     return $this->hasMany(RekamMedis::class, ['id_dokter' => 'id']);
    // }
}
