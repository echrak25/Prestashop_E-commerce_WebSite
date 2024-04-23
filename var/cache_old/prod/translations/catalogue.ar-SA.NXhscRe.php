<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('ar-SA', array (
));

$catalogueAr = new MessageCatalogue('ar', array (
));
$catalogue->addFallbackCatalogue($catalogueAr);

return $catalogue;
