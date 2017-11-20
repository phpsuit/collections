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
 * Immutable collection interface.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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