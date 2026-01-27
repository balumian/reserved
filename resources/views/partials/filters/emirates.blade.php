<div class="accordion-item">
    <h2 class="accordion-header" id="filterhead1">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterside1" aria-expanded="true" aria-controls="filterside1">
            Emirates
        </button>
    </h2>
    <div id="filterside1" class="accordion-collapse collapse show" aria-labelledby="filterhead1">

        <div class="accordion-body">
            @if($emirates = emirates())
            @foreach($emirates as $emirate)
            <div class="custom-radio">
                <input type="checkbox" id="emirates{{$emirate->id}}" class="radio-custom checkbox-custom" name="emirates" value="{{$emirate->id}}">
                <label for="emirates{{$emirate->id}}" class="radio-custom-label"><em>{{$emirate->name}}</em></label>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>