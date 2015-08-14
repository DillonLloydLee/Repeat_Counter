<?php
    class RepeatCounter {

        function countRepeats($text, $search) {

            $output = 0;

            if ($text == $search) {
                $output += 1;
            }

            return $output;

        }
    }
?>
