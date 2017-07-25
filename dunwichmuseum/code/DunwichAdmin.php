<?php

class DunwichAdmin extends ModelAdmin {
    
  public static $managed_models = array('DunwichResearch','ResearchCategory','ResearchTimePeriod');
 
  static $url_segment = 'DunwichAdmin'; 
  static $menu_title = 'Dunwich Admin';
 
}

