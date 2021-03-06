<?php
/*
* This file is part of the Acilia Component "Fragment Cache".
*
* (c) Acilia Internet <info@acilia.es>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Acilia\Component\FragmentCache\Configuration;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * @Annotation
 * Annotation for Configuration of the Fragment Cache
 *
 * @author Acilia Internet <info@acilia.es>
 */
class FragmentCache extends ConfigurationAnnotation
{
    /**
     * Expiration time in minutes
     *
     * @var integer
     */
    protected $expiration;

    /**
     * Version of the Fragment
     * @var integer
     */
    protected $version;

    /**
     * Custom Options
     *
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    protected $options;

    public function __construct(array $values)
    {
        $this->options = new ParameterBag();
        $this->version = 1;

        parent::__construct($values);
    }

    /**
     * Get the Expiration, returned in minutes
     * @return integer
     */
    public function getExpiration()
    {
        return (integer)$this->expiration;
    }

    /**
     * Sets the Expiration, in minutes
     * @param string $expiration
     * @return \Acilia\Component\FragmentCache\Configuration\FragmentCache
     */
    public function setExpiration($expiration)
    {
        if (!is_numeric($expiration)) {
            $expiration = 1;
        }

        $this->expiration = $expiration;
        return $this;
    }

    /**
     * Get the Version
     * @return integer
     */
    public function getVersion()
    {
        return (integer)$this->version;
    }

    /**
     * Sets the Version
     * @param integer $version
     * @return \Acilia\Component\FragmentCache\Configuration\FragmentCache
     */
    public function setVersion($version)
    {
        if (!is_numeric($version)) {
            $version = 1;
        }

        $this->version = $version;
        return $this;
    }

    /**
     * Get the Custom Options
     * @return \Symfony\Component\HttpFoundation\ParameterBag
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Sets the Custom Options
     * @param array $options
     * @return \Acilia\Component\FragmentCache\Configuration\FragmentCache
     */
    public function setOptions($options)
    {
        if (!is_array($options)) {
            $options = array();
        }

        $this->options->replace($options);
        return $this;
    }

    /**
     * Get the Alias
     * @return string
     */
    public function getAliasName()
    {
        return 'acilia_component_fragment_cache';
    }

    /**
     * Indicates if allow arrays
     * @return boolean
     */
    public function allowArray()
    {
        return false;
    }
}
