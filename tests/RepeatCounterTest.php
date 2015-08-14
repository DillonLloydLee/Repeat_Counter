<?php
    require_once "src/RepeatCounter.php";

    class RepeatCounterTest extends PHPUnit_Framework_TestCase {

        //Test One: a single letter in a single letter.
        function test_countRepeats_one() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "a";
            $search = "a";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }

        //Test Two: a single letter amongst several letters.
        function test_countRepeats_two() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "a big dog";
            $search = "a";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }

        //Test Three: a capitalized letter.
        function test_countRepeats_three() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "A big dog is a good dog.";
            $search = "a";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(2, $result);
        }

        //Test Four: ignore other word inclusion of search word.
        function test_countRepeats_four() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "The big dog named Theodore is the thief.";
            $search = "the";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(2, $result);
        }


    }
?>
