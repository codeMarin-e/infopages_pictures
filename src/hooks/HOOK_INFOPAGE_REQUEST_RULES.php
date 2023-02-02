<?php
    $rules["pictures"] = ['nullable', 'array', function($attribute, $value, $fail) use ($chInfopage) {
        $type = 'pictures';
        $inputName = "infopage[{$type}]";
        $attachIds = array();
        foreach($value as $index => $attachTypeId) {
            $attachIds[(int)str_replace(["{$inputName}_", "{$type}_"], '', $attachTypeId) ] = $index;
        }
        $return = \App\Models\Attachment::where([
            'attachable_id' => null,
            'attachable_type' => null,
            'session_id' => session()->getId(),
            'type' => $inputName
        ])->whereIn('id', array_keys($attachIds))->get()->keyBy('id');

        $allowedMimeTypes = ['image/png', 'image/jpeg', 'image/svg+xml', 'image/gif'];
        foreach($return as $attach) {
            //make some additional validation - may use new rules key pictures.*, too
            if(!in_array(
                \Illuminate\Support\Facades\Storage::disk( $attach->disk )->mimeType($attach->getFilePath()),
                $allowedMimeTypes
            )) {
                return $fail( trans('admin/infopages/validation.pictures.*.mime') );
            }
        }
        if($chInfopage) {
            $return = $return->union( \App\Models\Attachment::where([
                'attachable_id' => $chInfopage->id,
                'attachable_type' => get_class($chInfopage),
                'session_id' => null,
                'type' => $type
            ])->whereIn('id', array_keys($attachIds))->get()->keyBy('id') );
        }
        //sorting
        $this->mergeReturn['pictures'] = collect();
        foreach($attachIds as $attachId => $index) {
            if(!isset($return[$attachId])) continue;
            $this->mergeReturn['pictures']->push( $return[$attachId] );
        }
    }];
