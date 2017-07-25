<?php
	class ResearchCategory extends DataObject{
		
            public static $db = array(
                'Name' => 'Varchar(200)'
            );
            
            
            public static $belongs_many_many = array(
                'DunwichResearch' => 'DunwichResearch'
            );      

            public function getCMSFields(){
                return new FieldList(
                        new TextField('Name', 'Name')
                );
            }
            
            
	}

        
