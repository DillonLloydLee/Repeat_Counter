<?php
    require_once "src/RepeatCounter.php";

    class RepeatCounterTest extends PHPUnit_Framework_TestCase {

        //Test One: a single letter in a single letter.
        function test_countRepeats_singleLetter() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "a";
            $search = "a";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }


    }
?>
