<?php

return [
    'accepted' => ':attributeを受け入れる必要があります。',
    'active_url' => ':attributeは有効なURLではありません。',
    'after' => ':attributeは:dateより後の日付でなければなりません。',
    'after_or_equal' => ':attributeは:date以降の日付でなければなりません。',
    'alpha' => ':attributeは英字のみが含まれる必要があります。',
    'alpha_dash' => ':attributeには、英数字、ダッシュ、アンダースコアのみが含まれる必要があります。',
    'alpha_num' => ':attributeは英数字のみが含まれる必要があります。',
    'array' => ':attributeは配列である必要があります。',
    'before' => ':attributeは:dateより前の日付でなければなりません。',
    'before_or_equal' => ':attributeは:date以前の日付でなければなりません。',
    'between' => [
        'array' => ':attributeは:min〜:max個の間である必要があります。',
        'file' => ':attributeは:min〜:maxキロバイトの間である必要があります。',
        'numeric' => ':attributeは:min〜:maxの間である必要があります。',
        'string' => ':attributeは:min〜:max文字の間である必要があります。',
    ],
    'boolean' => ':attributeはtrueまたはfalseである必要があります。',
    'confirmed' => ':attributeが一致しません。',
    'date' => ':attributeは有効な日付ではありません。',
    'date_equals' => ':attributeは:dateと等しい日付でなければなりません。',
    'date_format' => ':attributeは:format形式と一致しません。',
    'different' => ':attributeと:otherは異なる必要があります。',
    'digits' => ':attributeは:digits桁である必要があります。',
    'digits_between' => ':attributeは:min〜:max桁の間である必要があります。',
    'dimensions' => ':attributeは無効な画像サイズです。',
    'distinct' => ':attributeに重複した値があります。',
    'email' => ':attributeは有効なメールアドレスである必要があります。',
    'ends_with' => ':attributeは、次のいずれかで終わる必要があります：:values。',
    'exists' => '選択された:attributeが無効です。',
    'file' => ':attributeはファイルである必要があります。',
    'filled' => ':attributeは必須です。',
    'gt' => [
        'array' => ':attributeは:valueより多くのアイテムを持つ必要があります。',
        'file' => ':attributeは:valueキロバイトより大きくなければなりません。',
        'numeric' => ':attributeは:valueより大きくなければなりません。',
        'string' => ':attributeは:value文字より大きくなければなりません。',
    ],
    'gte' => [
        'array' => ':attributeは:value個以上のアイテムを持つ必要があります。',
        'file' => ':attributeは:valueキロバイト以上である必要があります。',
        'numeric' => ':attributeは:value以上である必要があります。',
        'string' => ':attributeは:value文字以上である必要があります。',
    ],
    'image' => ':attributeは画像である必要があります。',
    'in' => '選択された:attributeが無効です。',
    'in_array' => ':attributeは:otherに存在しません。',
    'integer' => ':attributeは整数である必要があります。',
    'ip' => ':attributeは有効なIPアドレスである必要があります。',
    'ipv4' => ':attributeは有効なIPv4アドレスである必要があります。',
    'ipv6' => ':attributeは有効なIPv6アドレスである必要があります。',
    'json' => ':attributeは有効なJSON文字列である必要があります。',
    'lt' => [
        'array' => ':attributeは:valueより少ないアイテムを持つ必要があります。',
        'file' => ':attributeは:valueキロバイト未満である必要があります。',
        'numeric' => ':attributeは:value未満である必要があります。',
        'string' => ':attributeは:value文字未満である必要があります。',
    ],
    'lte' => [
        'array' => ':attributeは:value個以下のアイテムを持つ必要があります。',
        'file' => ':attributeは:valueキロバイト以下である必要があります。',
        'numeric' => ':attributeは:value以下である必要があります。',
        'string' => ':attributeは:value文字以下である必要があります。',
    ],
    'max' => [
        'array' => ':attributeは:max個を超えるアイテムを持つことはできません。',
        'file' => ':attributeは:maxキロバイトを超えることはできません。',
        'numeric' => ':attributeは:maxを超えることはできません。',
        'string' => ':attributeは:max文字を超えることはできません。',
    ],
    'mimes' => ':attributeは:valuesタイプのファイルである必要があります。',
    'min' => [
        'array' => ':attributeは少なくとも:min個のアイテムを持つ必要があります。',
        'file' => ':attributeは少なくとも:minキロバイトである必要があります。',
        'numeric' => ':attributeは少なくとも:minである必要があります。',
        'string' => ':attributeは少なくとも:min文字である必要があります。',
    ],
    'multiple_of' => ':attributeは:valueの倍数である必要があります。',
    'not_in' => '選択された:attributeが無効です。',
    'not_regex' => ':attributeの形式が無効です。',
    'numeric' => ':attributeは数字である必要があります。',
    'password' => [
        'letters' => ':attributeは少なくとも1つの文字を含む必要があります。',
        'mixed' => ':attributeは少なくとも1つの大文字と1つの小文字を含む必要があります。',
        'numbers' => ':attributeは少なくとも1つの数字を含む必要があります。',
        'symbols' => ':attributeは少なくとも1つの記号を含む必要があります。',
        'uncompromised' => ':attributeがデータリークに現れています。別の:attributeを選択してください。',
    ],
    'present' => ':attributeが存在する必要があります。',
    'regex' => ':attributeの形式が無効です。',
    'required' => ':attributeは必須です。',
    'required_if' => ':otherが:valueの場合、:attributeは必須です。',
    'required_unless' => ':otherが:valuesでない限り、:attributeは必須です。',
    'required_with' => ':valuesが存在する場合、:attributeは必須です。',
    'required_with_all' => ':valuesが存在する場合、:attributeは必須です。',
    'required_without' => ':valuesが存在しない場合、:attributeは必須です。',
    'required_without_all' => ':valuesが存在しない場合、:attributeは必須です。',
    'same' => ':attributeと:otherは一致する必要があります。',
    'size' => [
        'array' => ':attributeは:size個のアイテムを含む必要があります。',
        'file' => ':attributeは:sizeキロバイトである必要があります。',
        'numeric' => ':attributeは:sizeである必要があります。',
        'string' => ':attributeは:size文字である必要があります。',
    ],
    'starts_with' => ':attributeは、次のいずれかで始まる必要があります：:values。',
    'string' => ':attributeは文字列である必要があります。',
    'timezone' => ':attributeは有効なタイムゾーンである必要があります。',
    'unique' => ':attributeはすでに存在します。',
    'uploaded' => ':attributeのアップロードに失敗しました。',
    'url' => ':attributeは有効なURLである必要があります。',
    'uuid' => ':attributeは有効なUUIDである必要があります。',

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

    'attributes' => [

        //書籍情報登録
        'item_name'      => '書籍名',
        'published_at'   => '発売日',
        'user_id'        => 'ユーザーID',
        'category_id'    => 'カテゴリ',
        'item_name'      => '書籍名',
        'item_thumbnail' => '画像', 
        'item_price'    => '金額',
        'published_at'   => '公開日',
        'item_review'    => '書評',
        'publisher_name'    => '出版社',
    

        //お問い合わせフォーム
        'name'    => 'お名前',
        'email'   => 'メールアドレス',
        'message' => 'メッセージ',

    ],

];
