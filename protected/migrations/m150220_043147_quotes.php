<?php

class m150220_043147_quotes extends CDbMigration
{
	public function up()
	{
        $this->createTable("quotes",[
            'id'    => 'pk',
            'name'  => 'VARCHAR(20)',
            'price' => 'DECIMAL(12,6)',
            'symbol' => 'VARCHAR(20)',
            'ts'    => 'INT(11) unsigned',
            'type'  => 'VARCHAR(20)',
            'volume'=> 'TINYINT(3)',
            'created_at' => 'DATETIME',
            'updated_at' => 'DATETIME',
            'UNIQUE(name)'
        ]);
	}

	public function down()
	{
		$this->dropTable('quotes');
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}