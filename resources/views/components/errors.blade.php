@props(['name'])

<div>
    @error($name)
        <div {{ $attributes->class(['text-danger']) }}>
            {{ $message }}
        </div>
    @enderror
</div>
