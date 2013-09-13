<?php

namespace UAParser\Result;

/**
 * @author Benjamin Laugueux <benjamin@yzalis.com>
 */
interface BrowserResultInterface
{
    /**
     * Returns the browser family name.
     *
     * @return string
     */
    public function getFamily();

    /**
     * Returns the browser major version.
     *
     * @return string
     */
    public function getMajor();

    /**
     * Returns the browser minor version.
     *
     * @return string
     */
    public function getMinor();

    /**
     * Returns the browser patch version.
     *
     * @return string
     */
    public function getPatch();

    /**
    * Returns the browser full version, including the
    * major, minor and patch parts.
    *
    * @return string
    */
    public function getVersionString();

    /**
     * Returns the browser rendering engine.
     *
     * @return string
     */
    public function getRenderingEngine();

    /**
     * Extracts data from an array.
     *
     * @param array $data An array.
     */
    public function fromArray();
}
