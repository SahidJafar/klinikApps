<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resep_detail}}`.
 */
class m240716_081604_create_resep_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resep_detail}}', [
            'id' => $this->primaryKey(),
            'id_resep' => $this->string()->notNull(),
            'id_obat' => $this->string()->notNull(),
            'jumlah'=> $this->integer()->notNull(),
        ]);

        // Add foreign key
        $this->addForeignKey(
            'fk-resep_detail-id_resep',
            '{{%resep_detail}}',
            'id_resep',
            '{{%reseps}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-resep_detail-id_obat',
            '{{%resep_detail}}',
            'id_obat',
            '{{%obats}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drop foreign key first before dropping the table
        $this->dropForeignKey(
            'fk-resep_detail-id_resep',
            '{{%resep_detail}}'
        );
        $this->dropForeignKey(
            'fk-resep_detail-id_obat',
            '{{%resep_detail}}'
        );
        $this->dropTable('{{%resep_detail}}');
    }
}
