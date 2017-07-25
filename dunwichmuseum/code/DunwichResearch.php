<?php
	class DunwichResearch extends DataObject{
		
        public static $db = array(
            'OldID' => 'Varchar(10)',
            'Title' => 'Varchar(200)',
            'Description' => 'HTMLText',
            'ExternalLink' => 'Text',
            'Period' => 'Varchar(90)',
            'Topics' => 'Varchar(90)',
            'Locate' => 'Text',
            'Date' => 'Date',
            'Notes' => 'Text'
        );

        public static $has_one=array(
            'ResearchImage' => 'Image'
        );

        public static $many_many=array(
            'ResearchCategories' => 'ResearchCategory',
            'ResearchTimePeriods' => 'ResearchTimePeriod'
        );
            
        public function getCMSFields(){
            $fields = parent::getCMSFields();
            $fields->removeFieldFromTab('Root.Main','OldID');

            $fields->addFieldToTab('Root.Main', new TextField('Title', 'Title'));
            $fields->addFieldToTab('Root.Main', new HTMLEditorField('Description', 'Description'));  
            $fields->addFieldToTab('Root.Main', new TextField('ExternalLink', 'ExternalLink'));
            $fields->addFieldToTab('Root.Main', new UploadField('ResearchImage', 'Image'));
            $fields->addFieldToTab('Root.Main', new TextField('Period', 'Period'));
            $fields->addFieldToTab('Root.Main', new TextField('Topics', 'Topics'));
            $fields->addFieldToTab('Root.Main', new TextField('Locate', 'Locate'));
            $fields->addFieldToTab('Root.Main', new DateField('Date', 'Date'));
            $fields->addFieldToTab('Root.Main', new TextField('Notes', 'Notes'));
        
            return $fields;
        }

        public function getTopicNames(){
            $topics=$this->Topics;
            $topicsliced = explode(" ", $topics);
            $topicNames='';

            foreach ($topicsliced as $code) {
                $topicRecord=Topic::get()->filter(array('Code' => $code));
                foreach ($topicRecord as $c) {
                    if ($topicNames) {
                        $topicNames.=', '.$c->Name;
                    } else {
                        $topicNames=$c->Name;
                    }
                }
               
            }
            return $topicNames;
        }

        public function getPeriodNames(){
            $periods=$this->Period;
            $periodsliced = explode(" ", $periods);
            $periodName='';

            foreach ($periodsliced as $code) {
                $periodRecord=Period::get()->filter(array('Code' => $code));
                foreach ($periodRecord as $c) {
                    if ($periodName) {
                        $periodName.=', '.$c->Name;
                    } else {
                        $periodName=$c->Name;
                    }
                }
               
            }
            return $periodName;
        }

	}

        
