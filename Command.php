<?php

namespace AncientWorks\Artifact\Modules\Command;

use AncientWorks\Artifact\Artifact;
use AncientWorks\Artifact\Module;
use AncientWorks\Artifact\Modules\Command\Commands\OxygenBuilderCommand;
use WP_CLI;

/**
 * @package AncientWorks\Artifact
 * @since 0.0.1
 * @author ancientworks <mail@ancient.works>
 * @link https://github.com/artifact-modules/command
 */
class Command extends Module
{
    public static $module_id = 'command';
    public static $module_version = '0.0.1';
    public static $module_name = 'Artifact Command';

    public static $namespace;

    public function __construct()
    {
        self::$namespace = Artifact::$slug;
        parent::__construct();
    }

    public function boot()
    {
        if (!class_exists('WP_CLI')) {
            return;
        }

        if (class_exists('WP_CLI\Dispatcher\CommandNamespace')) {
            WP_CLI::add_command(self::$namespace, ArtifactNamespace::class);
        }

        WP_CLI::add_command(self::$namespace . ' oxygen-builder', OxygenBuilderCommand::class);
    }
}
