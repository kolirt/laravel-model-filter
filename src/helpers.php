<?php

\Illuminate\Database\Eloquent\Builder::macro('filter', function ($request = null) {
    $filter_name = config('model-filter.namespace') . class_basename($this->model) . config('model-filter.filter_postfix');
    if (class_exists($filter_name)) {
        $filter = new $filter_name;
        if (is_null($request)) {
            $data = request()->all();
        } else {
            $data = $request;
        }

        foreach ($data as $key => $item) {
            if (method_exists($filter, $key)) {
                $filter->$key($this, $item);
            }
        }
    }

    return $this;
});