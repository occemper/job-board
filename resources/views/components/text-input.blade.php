<div class="relative">
    @if ('textarea' != $type)
        @if ($formRef)
            <button type="button" class="absolute top-0 right-0 flex h-full items-center pr-2"
                @click="$refs['input-{{ $name }}'].value=''; $refs['{{ $formRef }}'].submit();">
                <svg class="h-4.5 w-4.5 text-slate-500" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d=" M6 18L18 6M6 6L18 18" stroke="#0F172A" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
        @endif
        <input x-ref="input-{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
            name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $name }}"
            @class([
                'w-full rounded-md border=0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ]) />
    @else
        <textarea name="{{ $name }}" id="{{ $name }}" @class([
            'w-full rounded-md border=0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2',
            'pr-8' => $formRef,
            'ring-slate-300' => !$errors->has($name),
            'ring-red-300' => $errors->has($name),
        ])>
                {{ old($name, $value) }}
        </textarea>
    @endif
    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
