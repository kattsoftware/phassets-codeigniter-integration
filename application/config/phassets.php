<?php

use Phassets\Filters\CssCompactFilter;
use Phassets\Filters\JSqueezeFilter;
use Phassets\Deployers\FilesystemDeployer;

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Explanation of the configuration array
 *
 *   ['assets_source']  An array of absolute paths where your assets can be located.
 *   ['filters']        An associative array of file extensions and their filters fully
 *                      qualified class names for being applied in specified order, as an array.
 *   ['deployers']      Two elements associative array:
 *                          ['main']    Fully qualified class name of the deployer which should
 *                                      be used when deploying assets.
 *                          ['backup']  Same as above; it's loaded only if 'main' is not supported.
 *
 *
 *   The configuration array may contain specific settings for some filters and/or deployers as well.
 *   For information regarding these, see https://github.com/kattsoftware/phassets.
 */
$config['phassets'] = array(
    'assets_source' =>  array(
        APPPATH . 'assets' . DIRECTORY_SEPARATOR . 'css',
        APPPATH . 'assets' . DIRECTORY_SEPARATOR . 'js',
    ),
    'filters' => array(
        'css' => array(
            CssCompactFilter::class
        ),
        'js' => array(
            JSqueezeFilter::class
        )
    ),
    'deployers' => array(
        'main' => FilesystemDeployer::class
    ),
    'filesystem_deployer' => array(
        'destination_path' => FCPATH . 'public',
        'base_url' => base_url('public') // base_url() is included in CI's Url helper
    )
);
