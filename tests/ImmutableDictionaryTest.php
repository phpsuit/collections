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
 * Test for ImmutableDictionary.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class ImmutableDictionaryTest extends TestCase
{
    private function getDict(): ImmutableDictionary
    {
        $o1 = new \stdClass();
        $o2 = new \stdClass();
        $o1->x = 1;
        $o2->x = 2;

        return new ImmutableDictionary(["t1" => $o1, "t2" => $o2]);
    }

    public function testInitAndGet(): void
    {
        $imDict = $this->getDict();
        $this->assertEquals(1, $imDict->get("t1")->x);
        $this->assertEquals(2, $imDict->get("t2")->x);
    }

    public function testCount(): void
    {
        $imDict = $this->getDict();
        $this->assertEquals(2, $imDict->count());
    }

    public function testEmpty(): void
    {
        $imDict = $this->getDict();
        $this->assertFalse($imDict->isEmpty());
    }

    public function testContains(): void
    {
        $imDict = $this->getDict();
        $o = new \stdClass();
        $o->x = 1;
        $this->assertTrue($imDict->contains($o));
        $o->x = 3;
        $this->assertFalse($imDict->contains($o));
    }

    public function testKeyOf(): void
    {
        $imDict = $this->getDict();
        $o = new \stdClass();
        $o->x = 1;
        $this->assertEquals("t1", $imDict->keyOf($o));
        $o->x = 2;
        $this->assertEquals("t2", $imDict->keyOf($o));
    }

    public function testHasKey(): void
    {
        $imDict = $this->getDict();
        $this->assertTrue($imDict->hasKey("t1"));
        $this->assertFalse($imDict->hasKey("xxx"));
    }

    public function testToArray(): void
    {
        $imDict = $this->getDict();
        $this->assertTrue(is_array($imDict->toArray()));
    }

    public function testIterate(): void
    {
        $imDict = $this->getDict();

        foreach ($imDict as $key => $item) {
            $this->assertTrue($item instanceof \stdClass);
        }
    }
}