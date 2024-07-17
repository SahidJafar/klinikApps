<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polis".
 *
 * @property string $id
 * @property string $nama_poliklinik
 *
 * @property Dokters[] $dokters
 * @property Registrasis[] $registrases
 */
class Polis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_poliklinik'], 'required'],
            [['nama_poliklinik'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nama_poliklinik' => 'Nama Poliklinik',
        ];
    }

    /**
     * Gets query for [[Dokters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokters()
    {
        return $this->hasMany(Dokters::class, ['id_poliklinik' => 'id']);
    }

    /**
     * Gets query for [[Registrases]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getRegistrases()
    // {
    //     return $this->hasMany(Registrasis::class, ['id_poliklinik' => 'id']);
    // }
}
