<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Phassets library wrapper for CodeIgniter 3
 *
 * This content is released under the MIT License (MIT).
 * @see LICENSE file
 */
class PhassetsLib
{
    /**
     * @var \Phassets\Phassets
     */
    private $phassets;

    /**
     * PhassetsLib constructor.
     */
    public function __construct()
    {
        if (!class_exists('\\Phassets\\Phassets')) {
            $error = 'Phassets library is not installed or loaded; Have you enabled Composer autoload?';

            log_message('error', $error);
            show_error($error);
        }

        $this->phassets = new \Phassets\Phassets(
            \Phassets\Configurators\CodeIgniterConfigurator::class,
            \Phassets\Loggers\CodeIgniterLogger::class,
            \Phassets\CacheAdapters\CodeIgniterCacheAdapter::class
        );
    }

    /**
     * Calls Phassets::createAsset() for creating the Asset instance,
     * then pushes it through Phassets workflow; will return the
     * modified Asset instance.
     *
     * @param string $file
     * @param null|array $customFilters
     * @param null|string $customDeployer
     * @return \Phassets\Asset
     */
    public function work($file, $customFilters = null, $customDeployer = null)
    {
        /** @var \Phassets\Asset $asset */
        $asset = $this->phassets->createAsset($file);

        $this->phassets->work($asset, $customFilters, $customDeployer);

        return $asset;
    }
}