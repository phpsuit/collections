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
 * Test for Dictionary.
 *
 * @author    Oleg Bronzov <oleg.bronzov@gmail.com>
 * @copyright 2017 PHPSuit
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class DictionaryTest extends ImmutableDictionaryTest
{
    private function getDict(): Dictionary
    {
        $o1 = new \stdClass();
        $o2 = new \stdClass();
        $o3 = new \stdClass();
        $o1->x = 1;
        $o2->x = 2;
        $o3->x = 3;

        return new Dictionary(["t1" => $o1, "t2" => $o2, "t3" => $o3]);
    }

    public function testInitAndGet(): void
    {
        $dict = $this->getDict();
        $this->assertEquals(1, $dict->get("t1")->x);
        $this->assertEquals(2, $dict->get("t2")->x);
        $this->assertEquals(3, $dict->get("t3")->x);
    }

    public function testRemove(): void
    {
        $dict = $this->getDict();
        $dict->remove("t1");

        $this->assertEquals(2, $dict->count());
        $this->assertEquals(3, $dict->get("t3")->x);
    }

    public function testAdd(): void
    {
        $dict = $this->getDict();
        $o = new \stdClass();
        $o->x = 4;
        $dict->add("t4", $o);

        $this->assertEquals(4, $dict->get("t4")->x);
        $this->assertEquals(4, $dict->count());
    }

    public function testAddAll(): void
    {
        $dict = $this->getDict();
        $o = new \stdClass();
        $o->x = 4;
        $dict->addAll(["t4" => $o]);

        $this->assertEquals(4, $dict->get("t4")->x);
        $this->assertEquals(4, $dict->count());
    }
}