<div class="accordion-item">
    <h2 class="accordion-header" id="filterhead3">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterside3" aria-expanded="true" aria-controls="filterside3">
            Special Features
        </button>
    </h2>
    <div id="filterside3" class="accordion-collapse collapse show" aria-labelledby="filterhead3">
        <div class="accordion-body">
            @if($features = get_features())
            @foreach($features as $key => $feature)
            <div class="custom-radio">
                <input type="checkbox" id="features{{$key}}" class="radio-custom checkbox-custom" name="s-features" value="{{$key}}">
                <label for="features{{$key}}" class="radio-custom-label"><em>{{$feature}}</em></label>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>