<?php
    class RepeatCounter {

        function countRepeats($text, $search) {

            $output = 0;
            $explode_text = str_split($text);

            foreach ($explode_text as $possible_word) {
                if ($possible_word == $search) {
                    $output += 1;
                }
            }

            return $output;

        }
    }
?>
