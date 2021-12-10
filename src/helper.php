<?php

use LasePeCo\Records\Recorder;

if (!function_exists('record')) {
    function record($message = null): Recorder
    {
        return tap(new Recorder(), function ($recorder) use ($message) {
            if ($message) {
                $recorder->message($message);
            }
        });
    }
}
