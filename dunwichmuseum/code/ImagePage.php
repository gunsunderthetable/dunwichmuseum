<?php

class ImagePage extends ContentPage {

}

class ImagePage_Controller extends Page_Controller {
private static $allowed_actions = array(
        'ImageSearchForm',
        'results'
    );
    
    
    public function ImageSearchForm()
    {
            $topicField=DropdownField::create("Topic","Topic",$this->getTopics());
            $topicField->setEmptyString('Select a topic');
            $periodField=DropdownField::create("Period","Period",$this->getPeriods());
            $periodField->setEmptyString('Select a period');
            $fields = new FieldList(
                    new TextField('Title','Title'),
                    $topicField,
                    $periodField
            );

            $actions = new FieldList(
                FormAction::create("results")->setTitle("Image Search")
            );

            $form = new Form($this, 'ImageSearchForm', $fields, $actions);
            return $form;  
    }

    public function results($data, Form $form) {
            $topic=$data['Topic'];
            $period=$data['Period'];
            $title=$data['Title'];
            
            $filter=array();
            if ($topic) {
                $filter['Topics:PartialMatch']=$topic;
            }
            if ($period) {
                $filter['Period:PartialMatch']=$period;
            }
            if ($title) {
                $filter['Title:PartialMatch']=$title;
            }
            $results = DunwichImage::get()->sort(array('Title'=>'ASC'))->filter($filter);
            $output=array(
                    'Title' => 'Image Search results',
                    'Results' => $results
            );
            return $this->owner->customise($output)->renderWith(array('ImageSearchPage_results', 'Page'));
            

        }
    
        public function getTopics() {
            if($topics = Topic::get()->sort('Name')) {
                return $topics->map('Code', 'Name', 'Please select a topic');
            } else {
                return array('no topics could be found');
            }
        }
        
        public function getPeriods() {
            if($periods = Period::get()->sort('Name')) {
                return $periods->map('Code', 'Name', 'Please select a period');
            } else {
                return array('no periods could be found');
            }
        }
        
	
}
