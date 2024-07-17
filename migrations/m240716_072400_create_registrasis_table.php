<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%registrasis}}`.
 */
class m240716_072400_create_registrasis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%registrasis}}', [
            'id' => $this->string(50)->notNull()->unique(),
            'id_pasien' => $this->string()->notNull(),
            'id_poliklinik' => $this->string()->notNull(),
            'tanggal_registrasi' => $this->date()->notNull(),
            'status_registrasi' => "ENUM('belum', 'selesai', 'dibatalkan') NOT NULL DEFAULT 'belum'",
        ]);

        // Add foreign key
        $this->addForeignKey(
            'fk_registrasis_id_pasien',
            '{{%registrasis}}',
            'id_pasien',
            '{{%pasiens}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_registrasis_id_poliklinik',
            '{{%registrasis}}',
            'id_poliklinik',
            '{{%polis}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // Trigger to generate the id with prefix 'RG'
        $this->execute("
            CREATE TRIGGER before_insert_registrasis
            BEFORE INSERT ON {{%registrasis}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('RG', UUID());
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_registrasis");

        // Drop foreign keys first before dropping the table
        $this->dropForeignKey(
            'fk_registrasis_id_pasien',
            '{{%registrasis}}'
        );
        $this->dropForeignKey(
            'fk_registrasis_id_poliklinik',
            '{{%registrasis}}'
        );

        // Drop the table
        $this->dropTable('{{%registrasis}}');
    }
}
