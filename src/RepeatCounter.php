<?php
    class RepeatCounter {

        function countRepeats($text, $search) {

            $output = 0;
            $search_stripped = preg_replace("/[^a-z0-9]+/i", " ", $search);
            $search_word = strtolower($search_stripped);
            $search_word_unstripped = strtolower($search);
            $text_stripped = preg_replace("/[^a-z0-9]+/i", " ", $text);
            $text_to_search = explode(" ", strtolower($text_stripped));
            $text_to_search_unstripped = explode(" ", strtolower($text));

            foreach ($text_to_search as $possible_word) {
                if ($possible_word == $search_word) {
                    $output += 1;
                }
            }
            if ($output == 0) {
                foreach ($text_to_search_unstripped as $possible_word) {
                    if ($possible_word == $search_word_unstripped) {
                        $output += 1;
                    }
                }
            }

            return $output;

        }
    }
?>
