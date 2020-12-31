<?php namespace Sehan\StaticStatuses\Classes;

use ApplicationException;
use October\Rain\Support\Collection;
use System\Classes\PluginManager;

class StatusManager
{
    use \October\Rain\Support\Traits\Singleton;

    /**
     * @var array List of registered Statuses.
     */
    protected $statuses = [];

    /**
     * @var System\Classes\PluginManager
     */
    protected $pluginManager;

    /**
     * Initialize this singleton.
     */
    protected function init()
    {
        $this->pluginManager = PluginManager::instance();
    }

    /**
     * Loads the menu items from modules and plugins
     * @return void
     */
    protected function loadStatuses()
    {
        /*
         * Load plugin items
         */
        $plugins = $this->pluginManager->getPlugins();

        foreach ($plugins as $id => $plugin) {
            if (!method_exists($plugin, 'registerStatuses')) {
                continue;
            }

            $statuses = $plugin->registerStatuses();
            if (!is_array($statuses)) {
                continue;
            }

            $this->registerStatuses($id, $statuses);
        }
    }

    public function registerStatuses($owner, array $classes)
    {
        if (!$this->statuses) {
            $this->statuses = [];
        }

        foreach ($classes as $class => $alias) {
            $status = (object) [
                'owner' => $owner,
                'class' => $class,
                'alias' => $alias,
            ];

            if(empty($class::ID)){
                $message = sprintf('Error in %s, Please Set Your Status ID First', $class);
                throw new ApplicationException($message);
            }

            $this->statuses[$alias] = $status;
        }
    }

    public function listStatuses($asObject = true)
    {
        if (empty($this->statuses)) {
            $this->loadStatuses();
        }

        if (!$asObject) {
            return $this->statuses;
        }

        /*
         * Enrich the collection with status objects
         */
        $collection = [];
        foreach ($this->statuses as $status) {
            if (!class_exists($status->class)) {
                continue;
            }

            $statusObj = new $status->class;
            $statusDetails = $statusObj->statusDetails();
            $collection[$status->alias] = (object) [
                'owner'          => $status->owner,
                'class'          => $status->class,
                'alias'          => $status->alias,
                'object'         => $statusObj,
                'name'           => array_get($statusDetails, 'name', 'Undefined'),
                'code'           => $statusObj->getCode(),
                'name_indonesia' => $statusObj->getName('ID'),
                'description'    => array_get($statusDetails, 'description', 'Undefined')
            ];
        }

        return new Collection($collection);
    }
}