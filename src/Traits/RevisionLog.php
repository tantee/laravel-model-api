<?php

namespace TaNteE\LaravelModelApi\Traits;

trait RevisionLog
{
    public static function bootRevisionLog()
    {
        static::updating(function ($model) {
            $model->saveRevision();
        });
    }

    public function saveRevision()
    {
        if (isset($this->toRevisionField) && is_array($this->toRevisionField)) {
            if ($this->isDirty($this->toRevisionField)) {
                $original = $this->getOriginal();
                $revisionClass = config('model-api.revision-model');
                $revisionKey = $this->getTable()."_".$this->getKeyName()."_".$this->getKey();

                if (class_exists($revisionClass)) {
                    $revision = new $revisionClass();
                    $revision->revisionKey = $revisionKey;
                    $revision->revisionDateTime = $original['updated_at'];
                    $revision->revisionData = $original;
                    $revision->save();
                }
            }
        }
    }

    public function getRevisionsAttribute() {
        $revisionClass = config('model-api.revision-model');
        $revisionKey = $this->getTable()."_".$this->getKeyName()."_".$this->getKey();

        return $revisionClass::where('revisionKey',$revisionKey)->get()->pluck('revisionData');
    }
}
