<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaksi_detail}}`.
 */
class m240716_083509_create_transaksi_detail_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaksi_detail}}', [
            'id' => $this->primaryKey(),
            'id_transaksi' => $this->string()->notNull(),
            'id_tindakan' => $this->string()->notNull(),
            'jumlah'=> $this->integer()->notNull(),
        ]);

        // Add foreign key
        $this->addForeignKey(
            'fk-transaksi_detail-id_transaksi',
            '{{%transaksi_detail}}',
            'id_transaksi',
            '{{%transaksis}}',
            'id',
            'CASCADE',
            'CASCADE',
        );
        $this->addForeignKey(
            'fk-transaksi_detail-id_tindakan',
            '{{%transaksi_detail}}',
            'id_tindakan',
            '{{%tindakans}}',
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
            'fk-transaksi_detail-id_transaksi',
            '{{%transaksi_detail}}'
        );
        $this->dropForeignKey(
            'fk-transaksi_detail-id_tindakan',
            '{{%transaksi_detail}}'
        );
        $this->dropTable('{{%transaksi_detail}}');
    }
}
