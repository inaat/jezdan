<?php

namespace Inaat\AdminMenusTests;

use LaravelLux\Html\HtmlServiceProvider;
use Inaat\AdminMenusMenusServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class BaseTestCase extends OrchestraTestCase
{
    public function setUp() : void
    {
        parent::setUp();

        // $this->setUpDatabase();
    }

    protected function getPackageProviders($app)
    {
        return [
            HtmlServiceProvider::class,
            MenusServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('menus', [
            'styles' => [
                'navbar' => \Inaat\AdminMenusPresenters\Bootstrap\NavbarPresenter::class,
                'navbar-right' => \Inaat\AdminMenusPresenters\Bootstrap\NavbarRightPresenter::class,
                'nav-pills' => \Inaat\AdminMenusPresenters\Bootstrap\NavPillsPresenter::class,
                'nav-tab' => \Inaat\AdminMenusPresenters\Bootstrap\NavTabPresenter::class,
                'sidebar' => \Inaat\AdminMenusPresenters\Bootstrap\SidebarMenuPresenter::class,
                'navmenu' => \Inaat\AdminMenusPresenters\Bootstrap\NavMenuPresenter::class,
            ],

            'ordering' => false,
        ]);
    }
}
