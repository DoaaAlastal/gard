<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'يجب اختيار صيغة مقبولة',
    'active_url' => 'رابط غير صالح !',
    'after' => 'اختر تاريخاً بعد تاريخ اليوم',
    'after_or_equal' => 'يجب ان يتساوي التاريخ بتاريخ اليوم أو تاريخ بعده !',
    'alpha' => 'لا يقبل قيم غير أبجدية !',
    'alpha_dash' => 'القيمة ممكن ان تحتوي حروف وأرقام و - و _ ',
    'alpha_num' => 'القيمة تحتوي فقط  حروف وأرقام ',
    'array' => 'يجب أن تكون القيمة مصفوفة !',
    'before' => 'اختر تاريخاً قبل من تاريخ اليوم',
    'before_or_equal' => 'يجب أن يتساوى التاريخ بتاريخ اليوم أو تاريخ قبله.',
    'between' => [
        'numeric' => 'يجب أن تكون القيمة بين :min و :max.',
        'file' => 'يجب أن تكون حجم الملف بين :min و :max كيلوبايت.',
        'string' => 'يجب أن تكون القيمة بين :min و :max حرف.',
        'array' => 'يجب أن تكون المصفوفة بين :min و :max عنصر.',
    ],
    'boolean' => 'يجب أن تكون القيمة true أو false',
    'confirmed' => 'كلمة المرور غير متطابقة',
    'date' => 'تاريخ غير صالح!',
    'date_equals' => 'يجب أن يتساوى التاريخ بتاريخ اليوم!',
    'date_format' => 'التاريخ لا يتساوى مع الصيغة التالية :format.',
    'different' => 'يجب أن تكون القيم مختلفة.',
    'digits' => 'يجب أن تساوي القيمة :digits رقم.',
    'digits_between' => 'يجب أن تكون القيمة بين :min و :max .',
    'dimensions' => 'خلل في قياسات الصورة',
    'distinct' => 'يحتوي الحقل على قيمة موجودة مسبقاً/مكررة',
    'email' => 'يرجى ادخال بريد الكتروني صالح!',
    'exists' => 'القيمة المختارة غير صالحة',
    'file' => 'يجب أن تكون القيمة ملف !',
    'filled' => 'يجب أن يحتوى الحقل على قيمة.',
    'gt' => [
        'numeric' => 'يجب أن تكون القيمة أكبر من :value.',
        'file' => 'يجب أن تكون القيمة أكبر من :value كيلوبايت.',
        'string' => 'يجب أن تكون القيمة أكبر من  :value حرف.',
        'array' => 'يجب أن تحتوى القيمة على أكثر من :value عنصر.',
    ],
    'gte' => [
        'numeric' => 'يجب أن تكون القيمة أكبر من أو تساوي :value.',
        'file' => 'يجب أن تكون القيمة أكبر من أو تساوي :value كيلوبايت.',
        'string' => 'يجب أن تكون القيمة أكبر من أو تساوي  :value حرف.',
        'array' => 'يجب أن تحتوى القيمة على أكثر من أو تساوي  :value عنصر.',
    ],
    'image' => 'يجب أن تكون القيمة المدخلة صورة',
    'in' => 'القيمة المحددة غير صحيحة',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'يجب أن تكون القيمة رقم !',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'يجب أن تكون القيمة أقل من :value.',
        'file' => 'يجب أن تكون القيمة أقل من :value كيلوبايت.',
        'string' => 'يجب أن تكون القيمة أقل من  :value حرف.',
        'array' => 'يجب أن تحتوى القيمة على أقل من :value عنصر.',
    ],
    'lte' => [
        'numeric' => 'يجب أن تكون القيمة أقل من أو تساوي :value.',
        'file' => 'يجب أن تكون القيمة أقل من أو تساوي :value كيلوبايت.',
        'string' => 'يجب أن تكون القيمة أقل من أو تساوي  :value حرف.',
        'array' => 'يجب أن تحتوى القيمة على أقل من أو تساوي  :value عنصر.',
    ],
    'max' => [
        'numeric' => 'يجب ألا تتجاوز القيمة المدخلة  :max.',
        'file' => 'يجب ألا تتجاوز القيمة المدخلة :max كيلوبايت.',
        'string' => 'يجب ألا تتجاوز القيمة المدخلة :max خانات.',
        'array' => 'يجب ألا تتجاوز المصفوفة المدخلة :max عناصر.',
    ],
    'mimes' => 'يجب أن تكون القيمة من الأنواع  type: :values.',
    'mimetypes' => 'يجب أن تكون القيمة من الأنواع type: :values.',
    'min' => [
        'numeric' => 'يجب أن تكون القيمة على الأقل :min خانات.',
        'file' => 'يجب أن تكون القيمة على الأقل :min كيلوبايت.',
        'string' => 'يجب أن تكون القيمة على الأقل :min خانات.',
        'array' => 'يجب أن تكون القيمة على الأقل :min عناصر.',
    ],
    'not_in' => 'القيمة المحددة غير صالحة.',
    'not_regex' => 'الصيغة غير صالحة',
    'numeric' => 'يجب أن تكون القيمة أرقام.',
    'present' => 'الحقل المدخل يجب أن يكون موجود',
    'regex' => 'الصيغة المدخلة غير صالحة',
    'required' => 'هذا الحقل مطلوب !',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'يجب أن تكون القيمة عبارة عن نص !',
    'timezone' => 'يجب أن تكون القيمة عبارة عن توقيت صالح !',
    'unique' => 'هذه القيمة موجودة مسبقاً! ',
    'uploaded' => 'فشل في تحميل الملف !',
    'url' => 'الرابط المدخل غير صالح !',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
