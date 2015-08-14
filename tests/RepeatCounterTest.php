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

        // The colon is an issue.  Either it is stripped away, but the
        // space where the underscore was ruins the search, or it makes
        // the "word" different from the search.  FIXED!

        // Test Six and a half: a word with an apostrophe.
        function test_countRepeats_sixAndAHalf() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "I can't recite that cant.";
            $search = "can't";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(1, $result);
        }

        // Test Seven: search for a hobbit hole.
        function test_countRepeats_seven() {

            $test_RepeatCounter = new RepeatCounter;
            $text = "In a hole in the ground there lived a hobbit. Not a nasty, dirty, wet hole, filled with the ends of worms and an oozy smell, nor a dry, bare, sandy hole with nothing in it to sit down on or to eat: it was a hobbit-hole, and that means comfort. It had a perfectly round door like a porthole, painted green, with a shiny yellow brass knob in the exact middle. The door opened on to a tube-shaped hall like a tunnel: a very comfortable tunnel without smoke, with panelled walls, and floors tiled and carpeted, provided with polished chairs, and lots and lots of pegs for hats and coats-- the hobbit was fond of visitors. The tunnel wound on and on, going fairly but not quite straight into the side of the hill-- The hill, as all the people for many miles round called it-- and many little round doors opened out of it, first on one side and then on another. No going upstairs for the hobbit: bedrooms, bathrooms, cellars, pantries (lots of these), wardrobes (he had whole rooms devoted to clothes), kitchens, dining-rooms, all were on the same floor, and indeed on the same passage. The best rooms were all on the left-hand side (going in), for these were the only ones to have windows, deep-set round windows looking over his garden, and meadows beyond, sloping down to the river.";
            $search = "HOLE";

            $result = $test_RepeatCounter->countRepeats($text, $search);

            $this->assertEquals(3, $result);
        }

    }
?>
