<?php

global $environment, $databaseConfig, $project, $password;


// Set the site locale
i18n::set_locale('en_GB');


// enable google maps for all pages
Object::add_extension('Page', 'GoogleMapsDecorator');

Security::setDefaultAdmin('admin', $password);
//PFutYJtJ?qNbfpzqd
//extend config
DataObject::add_extension('SiteConfig', 'SiteConfigExtension');

//the search
FulltextSearchable::enable();

BlogEntry::add_extension('BlogEntryExtension');