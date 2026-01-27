<div class="accordion-item">
    <h2 class="accordion-header" id="filterhead4">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#filterside4" aria-expanded="false" aria-controls="filterside4">
            Type
        </button>
    </h2>

    <div id="filterside4" class="accordion-collapse collapse" aria-labelledby="filterhead4">
        <div class="accordion-body">
            @if($types = get_business_types())
            @foreach($types as $type)
            <div class="custom-radio">
                <input type="checkbox" id="types{{$type->id}}" class="radio-custom checkbox-custom" name="type" value="{{$type->id}}">
                <label for="types{{$type->id}}" class="radio-custom-label"><em>{{$type->title}}</em></label>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>