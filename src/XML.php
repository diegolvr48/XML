<?php

namespace OliveraD\XML;

use OliveraD\XML\Exporters\ArrayExporter;
use OliveraD\XML\Exporters\ViewExporter;

/**
 * A Laravel XML Import & Export package.
 */
class XML
{
    /**
     * Optimize with underscores type.
     */
    public const OPTIMIZE_UNDERSCORE = 'underscore';

    /**
     * Optimize as camelCase type.
     */
    public const OPTIMIZE_CAMELCASE = 'camelcase';

    /**
     * Export a array to xml.
     *
     * @param array $data - the data to export
     *
     * @return \OliveraD\XML\Exporters\ArrayExporter
     * @author Amando Vledder <amando.vledder@nugtr.nl>
     */
    public static function export(array $data)
    {
        return new ArrayExporter($data);
    }

    /**
     * Export a view to laravel.
     *
     * @param string $viewName - the name of the view
     * @param array  $data     - the data to pass to the view
     *
     * @return \OliveraD\XML\Exporters\ViewExporter
     */
    public static function exportView(string $viewName, $data = [])
    {
        return new ViewExporter($viewName, $data);
    }

    /**
     * Import a xml file from a path.
     *
     * @param string $path - the path of the xml file. Can be a url/
     *
     * @param bool   $raw  - set to true to return raw xml data
     *
     * @return \OliveraD\XML\Data\XMLCollection|\OliveraD\XML\Data\XMLElement
     * @throws \Exception
     */
    public static function import(string $path, bool $raw = false)
    {
        $import = new XMLImporter($path);

        return $raw ? $import->raw() : $import->get();
    }
}
