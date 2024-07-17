<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%polis}}`.
 */
class m240716_040326_create_polis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%polis}}', [
           'id' => $this->string(50)->notNull()->unique(),
            'nama_poliklinik' => $this->string()->notNull(),
        ]);

        // Trigger to generate the id with prefix 'PL'
        $this->execute("
            CREATE TRIGGER before_insert_polis
            BEFORE INSERT ON {{%polis}} FOR EACH ROW
            BEGIN
                SET NEW.id = CONCAT('PL', UUID());
            END;
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop the trigger before dropping the table
        $this->execute("DROP TRIGGER IF EXISTS before_insert_polis");
        $this->dropTable('{{%polis}}');
    }
}
