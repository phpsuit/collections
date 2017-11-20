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

/**
 * Test for ImmutableCollection.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ImmutableCollectionTest extends TestCase
{
    private function getCollection(): ImmutableCollection
    {
        $o1 = new \stdClass();
        $o2 = new \stdClass();
        $o1->x = 1;
        $o2->x = 2;

        return new ImmutableCollection([$o1, $o2]);
    }

    public function testInitAndGet(): void
    {
        $imCollection = $this->getCollection();
        $this->assertEquals(1, $imCollection->get(0)->x);
        $this->assertEquals(2, $imCollection->get(1)->x);
    }

    public function testCount(): void
    {
        $imCollection = $this->getCollection();
        $this->assertEquals(2, $imCollection->count());
    }

    public function testEmpty(): void
    {
        $imCollection = $this->getCollection();
        $this->assertFalse($imCollection->isEmpty());
    }

    public function testContains(): void
    {
        $imCollection = $this->getCollection();
        $o = new \stdClass();
        $o->x = 1;
        $this->assertTrue($imCollection->contains($o));
        $o->x = 3;
        $this->assertFalse($imCollection->contains($o));
    }

    public function testIndexOf(): void
    {
        $imCollection = $this->getCollection();
        $o = new \stdClass();
        $o->x = 1;
        $this->assertEquals(0, $imCollection->indexOf($o));
        $o->x = 2;
        $this->assertEquals(1, $imCollection->indexOf($o));
    }

    public function testHasIndex(): void
    {
        $imCollection = $this->getCollection();
        $this->assertTrue($imCollection->hasIndex(1));
        $this->assertFalse($imCollection->hasIndex(3));
    }

    public function testToArray(): void
    {
        $imCollection = $this->getCollection();
        $this->assertTrue(is_array($imCollection->toArray()));
    }

    public function testIterate(): void
    {
        $imCollection = $this->getCollection();

        foreach ($imCollection as $item) {
            $this->assertTrue($item instanceof \stdClass);
        }
    }
}