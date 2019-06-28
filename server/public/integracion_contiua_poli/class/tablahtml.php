<?php

function array2table($array, $recursive = false, $null = '&nbsp;') {
    // Sanity check
    if (empty($array) || !is_array($array)) {
        return false;
    }

    if (!isset($array[0]) || !is_array($array[0])) {
        $array = array($array);
    }

    // Start the table
    $table = "<table class='blueTable'>\n";

    // The header
    $table .= "\t<thead><tr>";
    // Take the keys from the first row as the headings
    foreach (array_keys($array[0]) as $heading) {
        $table .= '<th>' . replacelabel($heading) . '</th>';
    }
    $table .= "</tr></thead><tbody>\n";

    // The body
    foreach ($array as $row) {
        $table .= "\t<tr>";
        foreach ($row as $cell) {
            $table .= '<td>';

            // Cast objects
            if (is_object($cell)) {
                $cell = (array) $cell;
            }

            if ($recursive === true && is_array($cell) && !empty($cell)) {
                // Recursive mode
                $table .= "\n" . array2table($cell, true, true) . "\n";
            } else {
                $table .= (strlen($cell) > 0) ?
                        htmlspecialchars((string) $cell) :
                        $null;
            }

            $table .= '</td>';
        }

        $table .= "</tr>\n";
    }

    $table .= '</tbody></table>';
    return $table;
}

function replacelabel($name){
    if($name == 'cantidad'){
       $name = 'cantidad disponible'; 
    }
    return $name;
}
