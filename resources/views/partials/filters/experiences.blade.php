<div class="accordion-item">
    <h2 class="accordion-header" id="filterhead2">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#filterside2" aria-expanded="true" aria-controls="filterside2">
            Experience
        </button>
    </h2>
    <div id="filterside2" class="accordion-collapse collapse show" aria-labelledby="filterhead2">
        <div class="accordion-body">
            @if($experiences = experiences())
            @foreach($experiences as $experience)
            <div class="custom-radio">
                <input type="checkbox" id="experiences{{$experience->id}}" class="radio-custom checkbox-custom" name="experience" value="{{$experience->id}}">
                <label for="experiences{{$experience->id}}" class="radio-custom-label"><em>{{$experience->title}}</em></label>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>