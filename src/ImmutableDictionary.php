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
 * Immutable dictionary.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   https://opensource.org/licenses/MIT
 */
class ImmutableDictionary extends AbstractBase implements ImmutableDictionaryInterface
{
    /**
     * @param array $elements
     */
    public function __construct(array $elements = [])
    {
        $this->storage = $elements;
    }

    /**
     * Checks the key is exists in this dictionary.
     *
     * @param string $key
     * @return bool
     */
    public function hasKey(string $key): bool
    {
        return isset($this->storage[$key]);
    }

    /**
     * Returns the element at the specified key in this collection.
     *
     * @param string $key
     * @return mixed
     * @throws KeyInvalidException
     */
    public function get(string $key)
    {
        $this->checkKeyExists($key);
        return $this->storage[$key];
    }

    /**
     * Returns the key of the first occurrence of the specified element in this collection,
     * or -1 if this dictionary does not contain the element.
     *
     * @param mixed $element
     * @return string
     */
    public function keyOf($element): ?string
    {
        $res = array_search($element, $this->storage);
        return ($res === false || $res === null) ? null : $res;
    }

    /**
     * @param string $key
     * @throws KeyInvalidException
     */
    protected function checkKeyExists(string $key): void
    {
        if (!$this->hasKey($key)) {
            throw new KeyInvalidException(sprintf('Invalid key [%s]', $key));
        }
    }
}