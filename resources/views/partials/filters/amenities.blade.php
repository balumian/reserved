<div class="accordion-item">
    <h2 class="accordion-header" id="filterhead6">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filterside6" aria-expanded="false" aria-controls="filterside6">
            Amenities
        </button>
    </h2>

    <div id="filterside6" class="accordion-collapse collapse" aria-labelledby="filterhead6">
        <div class="accordion-body">
            @if($amenities = get_amenities())
            @foreach($amenities as $key => $amenity)
            <div class="custom-radio">
                <input type="checkbox" id="amenities{{$key}}" class="radio-custom checkbox-custom" name="amenities" value="{{$key}}">
                <label for="amenities{{$key}}" class="radio-custom-label"><em>{{$amenity}}</em></label>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>