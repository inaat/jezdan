<?php

return [

    'styles' => [
        'navbar' => \Inaat\AdminMenusPresenters\Bootstrap\NavbarPresenter::class,
        'navbar-right' => \Inaat\AdminMenusPresenters\Bootstrap\NavbarRightPresenter::class,
        'nav-pills' => \Inaat\AdminMenusPresenters\Bootstrap\NavPillsPresenter::class,
        'nav-tab' => \Inaat\AdminMenusPresenters\Bootstrap\NavTabPresenter::class,
        'sidebar' => \Inaat\AdminMenusPresenters\Bootstrap\SidebarMenuPresenter::class,
        'navmenu' => \Inaat\AdminMenusPresenters\Bootstrap\NavMenuPresenter::class,
        'adminlte' => \Inaat\AdminMenusPresenters\Admin\AdminltePresenter::class,
        'zurbmenu' => \Inaat\AdminMenusPresenters\Foundation\ZurbMenuPresenter::class,
    ],

    'ordering' => false,

];
