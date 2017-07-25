<?php
class Period extends DataObject {
 
    private static $db = array(
      'Name' => 'Varchar',
      'Description' => 'Text',
      'Code' => 'Varchar'
    );

    static $searchable_fields = array(
      'Name'
    );

    static $summary_fields = array (
      'Name'
    );

    public function getCMSFields(){
      return new FieldList(
        new TextField('Name', 'Name'),
        new TextField('Description', 'Description'),
        new TextField('Code', 'Code')
      );
    }    
}