<?php

namespace TaNteE\LaravelModelApi\Traits;

trait RevisionLog
{
    public static function bootRevisionLog()
    {
        static::updating(function ($model) {
            if ($model->canSaveRevision()) $model->saveRevision();
        });
    }

    public function saveRevision()
    {
        if (isset($this->toRevisionField) && is_array($this->toRevisionField)) {
            if ($this->isDirty($this->toRevisionField)) {
                $original = $this->getOriginal();
                $this->saveRevisionData($original);
            }
        }
    }

    public function saveRevisionData($revisionData,$revisionDateTime=null) {
        $revisionClass = config('model-api.revision-model');
        $revisionKey = $this->getTable()."_".$this->getKeyName()."_".$this->getKey();

        if (class_exists($revisionClass)) {
            $revision = new $revisionClass();
            $revision->revisionKey = $revisionKey;
            $revision->revisionDateTime = ($revisionDateTime) ? $revisionDateTime : ((!empty($revisionData['updated_at'])) ? $revisionData['updated_at'] : \Carbon\Carbon::now());
            $revision->revisionData = $revisionData;
            $revision->save();
        }
    }

    public function getRevisionsAttribute() {
        $revisionClass = config('model-api.revision-model');
        $revisionKey = $this->getTable()."_".$this->getKeyName()."_".$this->getKey();

        return $revisionClass::where('revisionKey',$revisionKey)->get()->pluck('revisionData');
    }

    protected function canSaveRevision() {
        return true;
    }
}
