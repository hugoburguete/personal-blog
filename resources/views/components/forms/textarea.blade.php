<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $name ?? $id }}" cols="30" rows="10">{{ $value }}</textarea>
</div>