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
 * Immutable collection interface.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   https://opensource.org/licenses/MIT
 */
interface ImmutableCollectionInterface extends BaseInterface
{
    /**
     * Checks the index is exists in this collection.
     *
     * @param int $index
     * @return bool
     */
    public function hasIndex(int $index): bool;

    /**
     * Returns the element at the specified position in this collection.
     *
     * @param int $index
     * @return mixed
     * @throws IndexInvalidException
     */
    public function get(int $index);

    /**
     * Returns the index of the first occurrence of the specified element in this collection,
     * or -1 if this collection does not contain the element.
     *
     * @param mixed $element
     * @return int
     */
    public function indexOf($element): int;
}