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

use Traversable;

/**
 * Immutable collection.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   https://opensource.org/licenses/MIT
 */
class ImmutableCollection extends AbstractBase implements ImmutableCollectionInterface
{
    /**
     * Checks the index is exists in this collection.
     *
     * @param int $index
     * @return bool
     */
    public function hasIndex(int $index): bool
    {
        return isset($this->storage[$index]);
    }

    /**
     * Returns the element at the specified position in this collection.
     *
     * @param int $index
     * @return mixed
     */
    public function get(int $index)
    {
        $this->checkIndexExists($index);
        return $this->storage[$index];
    }

    /**
     * @param int $index
     * @throws IndexInvalidException
     */
    protected function checkIndexExists(int $index): void
    {
        if (!$this->hasIndex($index)) {
            throw new IndexInvalidException(sprintf('Invalid index [%s]', $index));
        }
    }

    /**
     * Returns the index of the first occurrence of the specified element in this collection,
     * or -1 if this collection does not contain the element.
     *
     * @param mixed $element
     * @return int
     */
    public function indexOf($element): int
    {
        $res = array_search($element, $this->storage);
        return ($res === false || $res === null) ? -1 : $res;
    }
}