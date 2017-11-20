<?php
/**
 * PHPSuit
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

declare(strict_types=1);

namespace PS\Collections;

/**
 * Dictionary interface.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Dictionary extends ImmutableDictionary implements DictionaryInterface
{
    /**
     * @param string $key
     * @throws KeyExistsException
     */
    protected function checkKeyNotExists(string $key): void
    {
        if ($this->hasKey($key)) {
            throw new KeyExistsException(sprintf('Key [%s] already in use', $key));
        }
    }

    /**
     * Adds element into this collection with specified key.
     *
     * @param string $key
     * @param mixed $element
     * @throws KeyExistsException
     */
    public function add(string $key, $element): void
    {
        $this->checkKeyNotExists($key);
        $this->storage[$key] = $element;
    }

    /**
     * Adds all elements from the specified array into this collection.
     *
     * @param array $elements
     * @throws KeyExistsException
     */
    public function addAll(array $elements): void
    {
        foreach ($elements as $key => $element) {
            $this->add($key, $element);
        }
    }

    /**
     * Replace old element with new one.
     *
     * @param string $key
     * @param mixed $element
     * @throws KeyInvalidException
     */
    public function replace(string $key, $element): void
    {
        $this->checkKeyExists($key);
        $this->storage[$key] = $element;
    }

    /**
     * Delete element from specified key.
     *
     * @param string $key
     * @throws KeyInvalidException
     */
    public function remove(string $key): void
    {
        $this->checkKeyExists($key);
        unset($this->storage[$key]);
    }
}