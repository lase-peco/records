<?php

namespace LasePeCo\Records;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use LasePeCo\Records\Models\Record;

class Recorder
{
    public Record $record;

    public function __construct()
    {
        $this->record = new Record();
    }

    public function onSubject(Model $subject)
    {
        $this->record->subject()->associate($subject);

        return $this;
    }

    public function message(string $message)
    {
        $this->record->message = $message;

        return $this;
    }

    public function properties($properties)
    {
        $this->record->properties = $properties;

        return $this;
    }

    public function __destruct()
    {
        if (!$this->record->causer_id) {
            $this->by(Auth::user() ?? null);
        }

        $this->record->ip = request()->ip();

        $this->record->save();
    }

    public function by(Model $causer = null)
    {
        if ($causer) {
            $this->record->causer()->associate($causer);
        }

        return $this;
    }
}
