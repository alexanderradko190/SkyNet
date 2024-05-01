<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationService
{
    public function validateTariffData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'price' => 'required|numeric|max:1000',
            'validity_period' => 'required|integer',
            'speed' => 'string|max:255',
            'type' => 'required|string|in:актуальный,архивный,системный',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        return null;
    }
}
