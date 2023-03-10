<?php
namespace NdeTermennetwerk;

use Omeka\Module\AbstractModule;
use ValueSuggest\Module as ValueSuggestModule;

class Module extends AbstractModule
{
    public function getConfig()
    {
        // Disable this module if the ValueSuggest module is not active.
        if (!class_exists(ValueSuggestModule::class, false)) {
            return [];
        }
        return include sprintf('%s/config/module.config.php', __DIR__);
    }
}
