<?php
	class DunwichImage extends DataObject{
		
        public static $db = array(
            'OldID' => 'Varchar(10)',
            'Title' => 'Varchar(200)',
            'Description' => 'HTMLText',
            'ExternalLink' => 'Text',
            'Filename' => 'Varchar(200)',
            'Format' => 'Varchar(10)',
            'Type' => 'Varchar(10)',
            'Period' => 'Varchar(90)',
            'Topics' => 'Varchar(90)'
        );

        public static $has_one=array(
            'ResearchImage' => 'Image'
        );
            
        public function getCMSFields(){
            return new FieldList(
                new TextField('Title', 'Title'),
                new HTMLEditorField('Description', 'Description'),
                new UploadField('ResearchImage', 'Image'),
                new TextField('ExternalLink','External link'),
                new TextField('Filename', 'Filename'),
                new TextField('Format', 'Format'),
                new TextField('Type', 'Type'),
                new TextField('Period', 'Period'),
                new TextField('Topics', 'Topics')
            );
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

        public function getMyImageURL() {
            $id=$this->ResearchImageID;
            $image=File::get()->byID($id);
            return $image->Filename;
            //return 'Monty';
        }

	}

        
