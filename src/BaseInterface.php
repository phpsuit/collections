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
 * Base collection interface.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface BaseInterface extends \IteratorAggregate, \Countable
{
    /**
     * Returns true if this collection contains no elements.
     *
     * @return bool
     */
    public function isEmpty(): bool;

    /**
     * Returns true if this collection contains the specified element
     *
     * @param mixed $element
     * @return bool
     */
    public function contains($element): bool;

    /**
     * An array representation of the collection.
     *
     * @return array
     */
    public function toArray(): array;
}