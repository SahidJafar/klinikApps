<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pasiens".
 *
 * @property string $id
 * @property string $nama
 * @property string $alamat
 * @property string $jenis_kelamin
 * @property string $tanggal_lahir
 * @property string $nomor_telepon
 *
 * @property Registrasis[] $registrases
 * @property RekamMedis[] $rekamMedis
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasiens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'jenis_kelamin', 'tanggal_lahir', 'nomor_telepon'], 'required'],
            [['jenis_kelamin'], 'string'],
            [['tanggal_lahir'], 'date', 'format' => 'php:Y-m-d'],
            [['nama', 'alamat', 'nomor_telepon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tanggal_lahir' => 'Tanggal Lahir',
            'nomor_telepon' => 'Nomor Telepon',
        ];
    }

    /**
     * Gets query for [[Registrases]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getRegistrases()
    // {
    //     return $this->hasMany(Registrasis::class, ['id_pasien' => 'id']);
    // }

    /**
     * Gets query for [[RekamMedis]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getRekamMedis()
    // {
    //     return $this->hasMany(RekamMedis::class, ['id_pasien' => 'id']);
    // }
}
