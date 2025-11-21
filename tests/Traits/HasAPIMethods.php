<?php

namespace Tests\Traits;

trait HasAPIMethods
{
    public function controller_has_method(string $method)
    {
        $can_has_method = in_array($method, $this->methods);
        $has_method = method_exists($this->controller, $method);

        $this->assertTrue(($can_has_method && $has_method) or (!$can_has_method && !$has_method));
    }

    public function test_controller_has_method_index(): void
    {
        $this->controller_has_method('index');
    }

    public function test_controller_has_method_store(): void
    {
        $this->controller_has_method('store');
    }

    public function test_controller_has_method_show(): void
    {
        $this->controller_has_method('show');
    }


    public function test_controller_has_method_update(): void
    {
        $this->controller_has_method('update');
    }

    public function test_controller_has_method_delete(): void
    {
        $this->controller_has_method('destroy');
    }
}
