<?php
    class RepeatCounter {

        function countRepeats($text, $search) {

            $output = 0;

            if ($text != "" || $search != ""){

                $search_stripped = str_replace(";", "", $search);
                $search_stripped = str_replace(":", "", $search_stripped);
                $search_stripped = str_replace(".", "", $search_stripped);
                $search_stripped = str_replace("?", "", $search_stripped);
                $search_stripped = str_replace("!", "", $search_stripped);
                $search_stripped = str_replace('"', "", $search_stripped);
                $search_stripped = str_replace("-", "", $search_stripped);
                $search_stripped = str_replace(",", "", $search_stripped);

                $search_word = strtolower($search_stripped);
                $search_word_unstripped = strtolower($search);

                $text_stripped = str_replace(";", "", $text);
                $text_stripped = str_replace(":", "", $text_stripped);
                $text_stripped = str_replace(".", "", $text_stripped);
                $text_stripped = str_replace("?", "", $text_stripped);
                $text_stripped = str_replace("!", "", $text_stripped);
                $text_stripped = str_replace('"', "", $text_stripped);
                $text_stripped = str_replace("-", "", $text_stripped);
                $text_stripped = str_replace(",", "", $text_stripped);

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
            }
            else {
                $search = "NOTHING";
                $output = "IMPOSSIBLE TO COMPUTE!";
            }

            $output = array($search, $output);
            return $output;

        }
    }
?>
