<?php

class Uptime extends Controller
{

    private $moduleName = 'uptime';

    public function getUptime()
    {
        $text = "exec() function is diabled.";
        if ($this->isExecEnabled()) {
            $text = @exec("uptime");
        }
        return $text;
    }

    public function registerActions()
    {
        ViewBag::set("uptime", $this->getUptime());
        echo Template::executeModuleTemplate($this->moduleName, "uptime.php");
    }

    private function isExecEnabled()
    {
        $disabled = explode(',', ini_get('disable_functions'));
        return ! in_array('exec', $disabled);
    }
}