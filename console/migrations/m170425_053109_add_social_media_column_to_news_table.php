<?php

use yii\db\Migration;

/**
 * Handles adding social_media to table `news`.
 */
class m170425_053109_add_social_media_column_to_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('news', 'social_media', "ENUM('facebook', 'google', 'twitter', 'github')");
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('news', 'social_media');
    }
}
