<?php

namespace Phassets\Configurators;

use Phassets\Interfaces\Configurator;

class CodeIgniterConfigurator implements Configurator
{
    /**
     * The name of /application/config/ configuration file.
     */
    const CONFIG_FILE_NAME = 'phassets';

    /**
     * @var CI_Controller CodeIgniter instance
     */
    private $ci;

    /**
     * CodeIgniterConfigurator constructor.
     */
    public function __construct()
    {
        $this->ci = &get_instance();

        $this->ci->config->load(self::CONFIG_FILE_NAME, false, true);
    }

    /**
     * Returns the config item having a specific name; if that setting
     * is an array, an index may be supplied in order to fetch the exact
     * array element.
     *
     * @param string $name Setting name
     * @param string $index If setting is an array, this can be array's key
     *                      for proper element fetch, otherwise it should be null
     * @return mixed The setting value; otherwise null
     */
    public function getConfig($name, $index = null)
    {
        if ($index === null) {
            return $this->ci->config->item($name, 'phassets');
        }

        $setting = $this->ci->config->item($name, 'phassets');

        return isset($setting[$index]) ? $setting[$index] : null;
    }
}