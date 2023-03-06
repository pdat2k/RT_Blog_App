<div class="auth-group-input form-group">
    <label class="auth-group-label d-block form-label" for="{{$input}}" >{{$label}}</label>
    <input class="auth-group-text d-block w-100 form-control @error((string)$input) mb-4 @enderror" id='{{$input}}' type="{{$type}}" name='{{$input}}' value="{{old((string)$input)}}" />
    @error((string)$input)
        <span class="auth-group-label mb-0 text-danger" style="cursor: context-menu;">
            Error: {{$message}}
        </span>
    @enderror
</div>
