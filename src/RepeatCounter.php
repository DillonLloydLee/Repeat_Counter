<?php
    class RepeatCounter {

        function countRepeats($text, $search) {

            $output = 0;
            $search_word = strtolower($search);
            $text_stripped = preg_replace("/[^a-z0-9]+/i", " ", $text);
            $text_to_search = explode(" ", strtolower($text_stripped));

            foreach ($text_to_search as $possible_word) {
                if ($possible_word == $search_word) {
                    $output += 1;
                }
            }

            return $output;

        }
    }
?>
