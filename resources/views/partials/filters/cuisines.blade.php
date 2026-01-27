<div class="accordion-item">
    <h2 class="accordion-header" id="filterhead5">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filterside5" aria-expanded="false" aria-controls="filterside5">
            Cuisine
        </button>
    </h2>

    <div id="filterside5" class="accordion-collapse collapse" aria-labelledby="filterhead5">
        <div class="accordion-body">
            @if($cuisines = get_cuisines())
            @foreach($cuisines as $key => $cuisine)
            <div class="custom-radio">
                <input type="checkbox" id="cuisine{{$key}}" class="radio-custom checkbox-custom" name="cuisine" value="{{$key}}">
                <label for="cuisine{{$key}}" class="radio-custom-label"><em>{{$cuisine}}</em></label>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>