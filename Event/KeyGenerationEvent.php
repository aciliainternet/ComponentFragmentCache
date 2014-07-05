<?php
/*
* This file is part of the Acilia Component "Fragment Cache".
*
* (c) Acilia Internet <info@acilia.es>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Acilia\Component\FragmentCache\Event;

use Acilia\Component\FragmentCache\Configuration\FragmentCacheConfiguration;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;

/**
 * Event sent when the Key for the Cache is being generated
 *
 * @author Acilia Internet <info@acilia.es>
 */
class KeyGenerationEvent extends Event
{
    /**
     * Name of the event
     * @var string
     */
    const NAME = 'fragment_cache.key_generation';

    /**
     * The Configuration of the Fragment Cache
     * @var \Acilia\Component\FragmentCache\Configuration\FragmentCacheConfiguration
     */
    protected $configuration;

    /**
     * The Sub Request being cached
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $subRequest;

    /**
     * The Master Request that originated the Sub Request
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $masterRequest;

    /**
     * Collection of Keys generated by the event dispatcher
     * @var array
     */
    protected $keys;

    /**
     * Constructor
     *
     * @param \Acilia\Component\FragmentCache\Configuration\FragmentCacheConfiguration $configuration
     * @param \Symfony\Component\HttpFoundation\Request $subRequest
     * @param \Symfony\Component\HttpFoundation\Request $masterRequest
     */
    public function __construct(FragmentCacheConfiguration $configuration, Request $subRequest, Request $masterRequest)
    {
        $this->configuration = $configuration;
        $this->subRequest = $subRequest;
        $this->masterRequest = $masterRequest;
        $this->keys = array();
    }

    /**
     * Get the Fragment Configuration
     * @return \Acilia\Component\FragmentCache\Configuration\FragmentCacheConfiguration
     */
    public function getConfigurarion()
    {
        return $this->configuration;
    }

    /**
     * Get the Sub Request
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getSubRequest()
    {
        return $this->subRequest;
    }

    /**
     * Get the Master Request
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getMasterRequest()
    {
        return $this->masterRequest;
    }

    /**
     * Adds a Key part
     * @param string $key
     * @return \Acilia\Component\FragmentCache\Event\KeyGenerationEvent
     */
    public function addKey($key)
    {
        $this->keys[] = sha1($key);
        return $this->keys;
    }

    /**
     * Get the Key Parts
     * @return array
     */
    public function getKeys()
    {
        return $this->keys;
    }
}