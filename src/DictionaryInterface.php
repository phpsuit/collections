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
interface DictionaryInterface extends ImmutableDictionaryInterface
{
    /**
     * Adds element into this collection with specified key.
     *
     * @param string $key
     * @param mixed $element
     * @throws KeyExistsException
     */
    public function add(string $key, $element): void;

    /**
     * Adds all elements from the specified array into this collection.
     *
     * @param array $elements
     * @throws KeyExistsException
     */
    public function addAll(array $elements): void;

    /**
     * Replace old element with new one.
     *
     * @param string $key
     * @param mixed $element
     * @throws KeyInvalidException
     */
    public function replace(string $key, $element): void;

    /**
     * Delete element from specified key.
     *
     * @param string $key
     * @throws KeyInvalidException
     */
    public function remove(string $key): void;
}