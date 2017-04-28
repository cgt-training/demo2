<?php

use yii\db\Migration;

/**
 * Handles adding position to table `news`.
 */
class m170425_052257_add_position_column_to_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('news', 'position', $this->integer());
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('news', 'position');
    }
}
