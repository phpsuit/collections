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

use Traversable;

/**
 * Base abstract collection.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
abstract class AbstractBase implements BaseInterface
{
    /**
     * @var array Elements storage.
     */
    protected $storage = [];

    /**
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->storage = array_values($elements);
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->storage);
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count(): int
    {
        return count($this->storage);
    }

    /**
     * Returns true if this collection contains no elements.
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->count() == 0;
    }

    /**
     * Returns true if this collection contains the specified element
     *
     * @param mixed $element
     * @return bool
     */
    public function contains($element): bool
    {
        return in_array($element, $this->storage);
    }

    /**
     * An array representation of the collection.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->getIterator()->getArrayCopy();
    }
}