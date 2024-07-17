<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dokters}}`.
 */
class m240716_040530_create_dokters_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%dokters}}', [
           'id' => $this->string(50)->notNull()->unique(),
            'id_poliklinik' => $this->string()->notNull(),
            'nama_dokter' => $this->string()->notNull(),
            "spesialis"=> $this->string()->notNull(),
            'alamat' => $this->string()->notNull(),
            'nomor_telepon' => $this->string()->notNull(),
        ]);

        // Add foreign key
        $this->addForeignKey(
            'fk_dokters_id_poliklinik',
            '{{%dokters}}',
            'id_poliklinik',
            '{{%polis}}',
            'id',
            'CASCADE',
            'CASCADE',
        );

        // Trigger to generate the id with prefix 'DK'
        $this->execute("
            CREATE TRIGGER before_insert_dokters
            BEFORE INSERT ON {{%dokters}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('DK', UUID());
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key first before dropping the table
        $this->dropForeignKey(
            'fk-dokters-id_poliklinik',
            '{{%dokters}}'
        );
        $this->dropTable('{{%dokters}}');
    }
}
