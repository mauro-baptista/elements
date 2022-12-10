@props(['name'])

@error($name)
    <div class="text-red-600 text-xs mt-1">{{ $message }}</div>
@enderror
