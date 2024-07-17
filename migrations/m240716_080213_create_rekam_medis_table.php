<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rekam_medis}}`.
 */
class m240716_080213_create_rekam_medis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rekam_medis}}', [
            'id' => $this->string(50)->notNull()->unique(),
            'id_pasien' => $this->string()->notNull(),
            'id_dokter' => $this->string()->notNull(),
            'id_registrasi' => $this->string()->notNull(),
            'anamesa' => $this->string()->notNull(),
            'diagnosa' => $this->string()->notNull(),
            'tanggal_periksa' => $this->date()->notNull(),
            'terapi' => $this->string()->notNull(),
        ]);

        // Add foreign key
        $this->addForeignKey(
            'fk_rekam_medis_id_pasien',
            '{{%rekam_medis}}',
            'id_pasien',
            '{{%pasiens}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk_rekam_medis_id_dokter',
            '{{%rekam_medis}}',
            'id_dokter',
            '{{%dokters}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk_rekam_medis_id_registrasi',
            '{{%rekam_medis}}',
            'id_registrasi',
            '{{%registrasis}}',
            'id',
            'CASCADE',
            'CASCADE',
        );

        // Trigger to generate the id with prefix 'RM'
        $this->execute("
            CREATE TRIGGER before_insert_rekam_medis
            BEFORE INSERT ON {{%rekam_medis}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('RM', UUID());
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_rekam_medis");

        // Drop foreign key first before dropping the table
        $this->dropForeignKey(
            'fk_rekam_medis_id_pasien',
            '{{%rekam_medis}}'
        );
        $this->dropForeignKey(
            'fk_rekam_medis_id_dokter',
            '{{%rekam_medis}}'
        );
        $this->dropForeignKey(
            'fk_rekam_medis_id_registrasi',
            '{{%rekam_medis}}'
        );
        $this->dropTable('{{%rekam_medis}}');
    }
}
