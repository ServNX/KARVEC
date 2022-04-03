<?php

namespace Tests\Feature\Views\Layouts;

use Tests\TestCase;

class MainLayoutTest extends TestCase
{
    protected $view;

    public function setUp(): void
    {
        parent::setUp();

        $this->view = $this->view('layout.main', []);
    }

}
