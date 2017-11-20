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

use PHPUnit\Framework\TestCase;
use Traversable;

/**
 * Test for Collection.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class CollectionTest extends ImmutableCollectionTest
{
    private function getCollection(): Collection
    {
        $o1 = new \stdClass();
        $o2 = new \stdClass();
        $o3 = new \stdClass();
        $o1->x = 1;
        $o2->x = 2;
        $o3->x = 3;

        return new Collection([$o1, $o2, $o3]);
    }

    public function testInitAndGet(): void
    {
        $collection = $this->getCollection();
        $this->assertEquals(1, $collection->get(0)->x);
        $this->assertEquals(2, $collection->get(1)->x);
        $this->assertEquals(3, $collection->get(2)->x);
    }

    public function testRemove(): void
    {
        $collection = $this->getCollection();
        $collection->remove(1);

        $this->assertEquals(2, $collection->count());
        $this->assertEquals(3, $collection->get(1)->x);
    }

    public function testAppend(): void
    {
        $collection = $this->getCollection();
        $o = new \stdClass();
        $o->x = 4;
        $collection->append($o);

        $this->assertEquals(4, $collection->get(3)->x);
        $this->assertEquals(4, $collection->count());
    }

    public function testAppendAll(): void
    {
        $collection = $this->getCollection();
        $o = new \stdClass();
        $o->x = 4;
        $collection->appendAll([$o]);

        $this->assertEquals(4, $collection->get(3)->x);
        $this->assertEquals(4, $collection->count());
    }
}