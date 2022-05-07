<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%csv_map}}`.
 */
class m211110_203816_create_csv_map_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%csv_map}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(1024),
            'values' => $this->text(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%csv_map}}');
    }
}