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
 * Collection implementation.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   https://opensource.org/licenses/MIT
 */
class Collection extends ImmutableCollection implements CollectionInterface
{
    /**
     * Appends element into end of this collection.
     *
     * @param mixed $element
     */
    public function append($element): void
    {
        $this->storage[] = $element;
    }

    /**
     * Appends all elements from the specified array into the end of this collection.
     *
     * @param array $elements
     */
    public function appendAll(array $elements): void
    {
        foreach ($elements as $element) {
            $this->append($element);
        }
    }

    /**
     * Replace old element with new one.
     *
     * @param int $index
     * @param mixed $element
     * @throws IndexInvalidException
     */
    public function replace(int $index, $element): void
    {
        $this->checkIndexExists($index);
        $this->storage[$index] = $element;
    }

    /**
     * Delete element from specified position.
     *
     * @param int $index
     * @throws IndexInvalidException
     */
    public function remove(int $index): void
    {
        $this->checkIndexExists($index);
        unset($this->storage[$index]);
        $this->storage = array_values($this->storage);
    }
}