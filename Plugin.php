<?php namespace Sehan\StaticStatuses;

use Backend;
use System\Classes\PluginBase;

/**
 * StaticStatuses Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'StaticStatuses',
            'description' => 'No description provided yet...',
            'author'      => 'Sehan',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Sehan\StaticStatuses\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'sehan.staticstatuses.some_permission' => [
                'tab' => 'StaticStatuses',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'staticstatuses' => [
                'label'       => 'StaticStatuses',
                'url'         => Backend::url('sehan/staticstatuses/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['sehan.staticstatuses.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerStatuses()
    {
        return [
            \Sehan\StaticStatuses\StatusTypes\Success::class   => 'success',
            \Sehan\StaticStatuses\StatusTypes\Cancelled::class => 'cancelled',
            \Sehan\StaticStatuses\StatusTypes\Expired::class   => 'expired',
            \Sehan\StaticStatuses\StatusTypes\Pending::class   => 'pending',
        ];
    }
}
