<?php

/**
 * Phassets helper functions for CodeIgniter 3
 *
 * This content is released under the MIT License (MIT).
 * @see LICENSE file
 */
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('js') && !function_exists('css') && !function_exists('asset')) {
    get_instance()->load->library('PhassetsLib');

    /**
     * Processes a JS file and returns the suitable HTML structure.
     *
     * @param string $file
     * @param null|array $customFilters
     * @param null|string $customDeployer
     * @return string A <script> HTML tag
     */
    function js($file, $customFilters = null, $customDeployer = null)
    {
        $asset = get_instance()->phassetslib->work($file, $customFilters, $customDeployer);

        $assetUrl = $asset->getOutputUrl();

        if ($assetUrl === null) {
            return '<script>' . $asset->getContents() . '</script>';
        }

        return '<script src="' . $assetUrl . '"></script>';
    }

    /**
     * Processes a CSS file and returns the suitable HTML structure.
     *
     * @param string $file
     * @param null|array $customFilters
     * @param null|string $customDeployer
     * @return string A <style> HTML tag
     */
    function css($file, $customFilters = null, $customDeployer = null)
    {
        $asset = get_instance()->phassetslib->work($file, $customFilters, $customDeployer);

        $assetUrl = $asset->getOutputUrl();

        if ($assetUrl === null) {
            return '<style>' . $asset->getContents() . '</style>';
        }

        return ' <link rel="stylesheet" type="text/css" href="' . $assetUrl . '" />';
    }

    /**
     * Processes a file and returns the URL to deployed version of asset.
     *
     * @param string $file
     * @param null|array $customFilters
     * @param null|string $customDeployer
     * @return string The output URL of the asset
     */
    function asset($file, $customFilters = null, $customDeployer = null)
    {
        $asset = get_instance()->phassetslib->work($file, $customFilters, $customDeployer);

        return $asset->getOutputUrl();
    }
}