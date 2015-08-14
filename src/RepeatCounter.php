<?php
    class RepeatCounter {

        function countRepeats($text, $search) {

            $output = 0;
            $search_word = strtolower($search);
            $text_to_search = str_split(strtolower($text));

            foreach ($text_to_search as $possible_word) {
                if ($possible_word == $search_word) {
                    $output += 1;
                }
            }

            return $output;

        }
    }
?>
