<?php

class SiteConfigExtension extends DataExtension {
    private static $db = array(
        'FooterLinks' => 'Text',
        'HeaderLinks' => 'Text',
        'TwitterLink' => 'Text',
        'FacebookLink' => 'Text',
        'GoogleAnalytics' => 'Varchar(20)',
        'HeaderSize' => 'Varchar(20)',
        'HeaderColour' => 'Varchar(20)',
        'HeaderDropShadow' => 'Boolean',
        'HeaderBackground' => 'Boolean',
        'SiteColour' => 'Text',
        'HeaderFont' => 'Text',
        'BodyFont' => 'Text',
        'HeaderDepth' => 'Text',
        'HideHeaderText' => 'Text',
        'HideSearch' => 'Boolean'
    );
    
    private static $has_one = array(
        'Favicon' => 'Image',
        'Masthead' => 'Image',
        'Logo' => 'Image'
    );

    public function updateCMSFields(FieldList $fields)  {  
        $fields->addFieldToTab('Root.Main', DropdownField::create('HeaderSize', 'Header text size', array('medium'=>'medium','large' => 'large')),'Theme');
        $fields->addFieldToTab('Root.Main', DropdownField::create('HeaderColour', 'Header text colour', array('white'=>'white','black'=>'black','blue'=>'blue','grey' => 'grey')),'Theme');
        $fields->addFieldToTab('Root.Main', new TextField('HeaderDepth', 'Header depth in pixels - defaults to 300 if left blank'));
        $fields->addFieldToTab('Root.Main', new CheckBoxField('HideHeaderText', "Don't show header text"));

        $fields->addFieldToTab('Root.Main', DropdownField::create('SiteColour', 'Site colour', array('default' => 'default', 'blue'=>'blue','green'=>'green','purple' => 'purple','silver' => 'silver')));
        $fields->addFieldToTab('Root.Main', DropdownField::create('HeaderFont', 'Header font', array('Roboto Slab' => 'Roboto','Acme' => 'Acme','Rubik' => 'Rubik','Hammersmith One' => 'Hammersmith One','Luckiest Guy' => 'Luckiest Guy','Merriweather'=>'Merriweather','Paytone One' => 'Paytone One','Baloo Bhaina'=>'Bhaina','Passion One' => 'Passion one','Open+Sans'=>'Open sans')));
        $fields->addFieldToTab('Root.Main', DropdownField::create('BodyFont', 'Body font', array('Open Sans'=>'Open sans','Roboto Slab' => 'Roboto')));
        $fields->addFieldToTab('Root.Main', new CheckBoxField('HeaderDropShadow', 'Header drop shadow'),'Theme');
        $fields->addFieldToTab('Root.Main', new CheckBoxField('HeaderBackground', 'Header solid background'),'Theme');
        $fields->addFieldToTab('Root.Main', new TextField('GoogleAnalytics', 'Google analytics ID'));
        $fields->addFieldToTab('Root.Main', new CheckBoxField('HideSearch', 'Remove the search field from the header panel'));


        $fields->addFieldToTab('Root.SocialMedia', new TextField('TwitterLink', 'link to Twitter (include http)'));
        $fields->addFieldToTab('Root.SocialMedia', new TextField('FacebookLink', 'link to Facebook (include http)'));
        $fields->addFieldToTab('Root.Footer', new TextareaField('FooterLinks', 'Footer links - one link per line. The format is: Page or external web address&lt;space&gt;Text to use as the link<br>For example - /about-us About our company <br>or http://www.google.co.uk Google'));
        $fields->addFieldToTab('Root.Header', new TextareaField('HeaderLinks', 'Header links - one link per line. The format is: Page or external web address&lt;space&gt;Text to use as the link<br>For example - /about-us About our company <br>or http://www.google.co.uk Google'));
        $mastheadField=UploadField::create('Masthead', 'Your masthead')->setDescription('The CMS will resize your image to 1580 by 400 pixels when you upload it.');
        $fields->addFieldToTab('Root.HeaderImages', $mastheadField);
        $logoField=UploadField::create('Logo', 'Your logo')->setDescription('Your organisation logo if you have one.');
        $fields->addFieldToTab('Root.HeaderImages', $logoField);
        $faviconField=UploadField::create('Favicon', 'Your Favicon')->setDescription("Your Favicon is a small image that will be displayed in a user's browser tab. You can leave this blank if you don't have one.");
        $fields->addFieldToTab('Root.HeaderImages', $faviconField);
    }
    
    public function getSiteFonts() {
        if ($this->owner->BodyFont || $this->owner->HeaderFont) {
            $fontString = $this->owner->BodyFont.'|'.$this->owner->HeaderFont;
        } else {
            $fontString = 'Open Sans|Roboto Slab:400,700';
        }
        return $fontString;
    }
    
    public function getFontCss() {
        $headerWeight = '';
        if ($header = $this->owner->HeaderFont) {
            if ($header == 'Baloo Bhaina' || $header == 'Passion One' || $header == 'Acme' || $header == 'Luckiest Guy' || $header == 'Paytone One' || $header == 'Hammersmith One') {
                $headerWeight = 'font-weight:normal;padding-top:4px;letter-spacing:0.3px';
            }
            return '<style>body{font-family:"'.$this->owner->BodyFont.'", arial, sans-serif;} h1,h2,h3,h4,h5,h6 {font-family:"'.$this->owner->HeaderFont.'", arial, sans-serif;'.$headerWeight.'}</style>';            
        } else {
            return '<style>body{font-family:"Open Sans", arial, sans-serif;} h1,h2,h3,h4,h5,h6 {font-family:"Roboto Slab", arial, sans-serif;'.$headerWeight.'}</style>';            
            
        }

    }

}
