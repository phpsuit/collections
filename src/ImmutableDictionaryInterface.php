<?php
/**
 * PHPSuit
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace PS\Collections;

/**
 * Immutable dictionary interface.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   https://opensource.org/licenses/MIT
 */
interface ImmutableDictionaryInterface extends BaseInterface
{
    /**
     * Checks the key is exists in this dictionary.
     *
     * @param string $key
     * @return bool
     */
    public function hasKey(string $key): bool;

    /**
     * Returns the element at the specified key in this collection.
     *
     * @param string $key
     * @return mixed
     * @throws KeyInvalidException
     */
    public function get(string $key);

    /**
     * Returns the key of the first occurrence of the specified element in this collection,
     * or "null" if this dictionary does not contain the element.
     *
     * @param mixed $element
     * @return string
     */
    public function keyOf($element): ?string;
}