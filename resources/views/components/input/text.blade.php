<input {{ $attributes
    ->merge(['type' => 'text'])
    ->class([
        'block w-full py-2 border-4 border-gray-300 focus:ring-0 focus:border-green-500 text-base rounded-lg',
    ])
}}>
