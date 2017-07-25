UPDATE DunwichImage
INNER JOIN File ON (DunwichImage.Filename = File.Title)
SET DunwichImage.ResearchImageID = File.ID

   

        public function getTopicNames(){
            echo 'hit the func <br>';
            $topics=$this->Topics;
            $topicsliced = explode(" ", $topic);
            $topicNames='';
            foreach ($topicsliced as $code) {
                $topicRecord=Topic::get()->filter(array('Code' => $code));
                if $topicNames {
                    $topicNames=.', '.$topicRecord->Name;
                } else {
                    $topicNames=$topicRecord->Name;
                }
            }
            return $topicNames;
        }

	


        
