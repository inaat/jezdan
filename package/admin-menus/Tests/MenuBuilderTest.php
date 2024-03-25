<?php

namespace Inaat\AdminMenusTests;

use Illuminate\Config\Repository;
use Inaat\AdminMenusMenuBuilder;
use Inaat\AdminMenusMenuItem;

class MenuBuilderTest extends BaseTestCase
{
    /** @test */
    public function it_makes_a_menu_item()
    {
        $builder = new MenuBuilder('main', app(Repository::class));

        self::assertInstanceOf(MenuItem::class, $builder->url('hello', 'world'));
    }
}
