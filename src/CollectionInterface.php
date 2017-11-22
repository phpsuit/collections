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
 * Collection interface.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   https://opensource.org/licenses/MIT
 */
interface CollectionInterface extends ImmutableCollectionInterface
{
    /**
     * Appends element into end of this collection.
     *
     * @param mixed $element
     */
    public function append($element): void;

    /**
     * Appends all elements from the specified array into the end of this collection.
     *
     * @param array $elements
     */
    public function appendAll(array $elements): void;

    /**
     * Replace old element with new one.
     *
     * @param int $index
     * @param mixed $element
     * @throws IndexInvalidException
     */
    public function replace(int $index, $element): void;

    /**
     * Delete element from specified position.
     *
     * @param int $index
     * @throws IndexInvalidException
     */
    public function remove(int $index): void;
}