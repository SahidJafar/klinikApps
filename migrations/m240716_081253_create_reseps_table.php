<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reseps}}`.
 */
class m240716_081253_create_reseps_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reseps}}', [
            'id' => $this->string(50)->notNull()->unique(),
            'id_rekam_medis'=> $this->string()->notNull(),
            'tanggal_resep' => $this->date()->notNull(),
        ]);

        // Add foreign key
        $this->addForeignKey(
            'fk_resep_id_rekam_medis',
            '{{%reseps}}',
            'id_rekam_medis',
            '{{%rekam_medis}}',
            'id',
            'CASCADE',
            'CASCADE',
        );

        // Trigger to generate the id with prefix 'RS'
        $this->execute("
            CREATE TRIGGER before_insert_resep
            BEFORE INSERT ON {{%reseps}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('RS', UUID());
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
            'fk_resep_id_rekam_medis',
            '{{%reseps}}'
        );
        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_resep");
        $this->dropTable('{{%reseps}}');
    }
}
