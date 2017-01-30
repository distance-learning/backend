<?php

if (!function_exists('process_array_keys')) {
    function process_array_keys(array $elements) {
        $processedElements = [];

        foreach ($elements as $key => $value) {
            $newKey = explode('.', $key);
            $countBlocksInKey = sizeof($newKey);
            $newKey = $newKey[$countBlocksInKey - 1];

            $processedElements[$newKey] = $value;
        }

        return $processedElements;
    }
}
