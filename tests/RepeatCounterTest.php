<?php
    require_once "src/RepeatCounter.php";

    class RepeatCounterTest extends PHPUnit_Framework_TestCase {

        // Test One: a single letter in a single letter.
        function test_countRepeats_one() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "a";
            $search = "a";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }

        // Test Two: a single letter amongst several letters.
        function test_countRepeats_two() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "a big dog";
            $search = "a";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }

        // Test Three: a capitalized letter.
        function test_countRepeats_three() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "A big dog is a good dog.";
            $search = "a";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(2, $result);
        }

        // Test Four: ignore other word inclusion of search word.
        function test_countRepeats_four() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "The big dog named Theodore is the thief.";
            $search = "the";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(2, $result);
        }

        // Test Five: ignore certain punctuation.
        function test_countRepeats_five() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "ERROR: THE BIG DOG IS LOOSE! ERROR!";
            $search = "error";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(2, $result);
        }

        // Test Six: still finds weird stuff.
        function test_countRepeats_six() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "666BATCH_ERROR~!!%: THE BIG DOG IS LOOSE!";
            $search = "666BATCH_ERROR~!!%";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }

        // The colon is the issue.  Either it is stripped away, but the
        // space where the underscore was ruins the search, or it makes
        // the "word" different from the search.

        // Test Six and a half: a word with an apostrophe.
        function test_countRepeats_sixAndAHalf() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "I can't recite that cant.";
            $search = "can't";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }


    }
?>
