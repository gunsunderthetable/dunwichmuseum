<?php

class ResearchPage extends ContentPage {

}

class ResearchPage_Controller extends Page_Controller {
private static $allowed_actions = array(
        'ResearchSearchForm',
        'results',
        'Reset'
    );
    
    
    public function ResearchSearchForm()
    {
            $topicField=DropdownField::create("Topic","Topic",$this->getTopics());
            if ($topic=Session::get('MyTopic')) {
                $topicField->setValue($topic);
            }
            $topicField->setEmptyString('Select a topic');

            $periodField=DropdownField::create("Period","Period",$this->getPeriods());
            if ($period=Session::get('MyPeriod')) {
                $periodField->setValue($period);
            }
            $periodField->setEmptyString('Select a period');
            
            $titleField=new TextField('Title','Title');
            if ($title=Session::get('MyTitle')) {
                $titleField->setValue($title);
            }

            $fields = new FieldList(
                $titleField,
                $topicField,
                $periodField
            );

            $actions = new FieldList(
                FormAction::create("results")->setTitle("Search"),
                FormAction::create("resetter")->setTitle("Reset")
            );

            $form = new Form($this, 'ResearchSearchForm', $fields, $actions);
            return $form;  
    }

    public function results($data, Form $form) {
            $topic=$data['Topic'];
            $period=$data['Period'];
            $title=$data['Title'];
            //echo $topic.' '.$period.' '.$title.'</br></br>';
            
            $filter=array();
            if ($topic) {
                $filter['Topics:PartialMatch']=$topic;
                Session::set('MyTopic', $topic);
            }
            if ($period) {
                $filter['Period:PartialMatch']=$period;
                Session::set('MyPeriod', $period);
            }
            if ($title) {
                $filter['Title:PartialMatch']=$title;
                Session::set('MyTitle', $title);
            }
            $results = DunwichResearch::get()->sort(array('Title'=>'ASC'))->filter($filter);
            //var_dump($results);
            $output=array(
                    'Title' => 'Search results',
                    'Results' => $results,
                    'Query' => 'Topic is = '.$topic
            );
            return $this->owner->customise($output)->renderWith(array('ResearchSearchPage_results', 'Page'));
        }

        public function resetter($data, Form $form) {
            Session::set('MyTopic', false);
            Session::set('MyPeriod', false);
            Session::set('MyTitle', null);

            $results = "";
            //var_dump($results);
            $output=array(
                    'FormReset' => 'The form was reset',
                    'Title' => 'Search',
                    'Results' => $results,
                    'Query' => 'Topic is = '.$topic
             );
            return $this->owner->customise($output)->renderWith(array('ResearchSearchPage_results', 'Page'));
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
