<div class="accordion-item">
    <h2 class="accordion-header price-range-header">
        <button class="accordion-button" type="button">
            Price
        </button>
    </h2>
    <div class="accordion-collapse">
        <div class="accordion-body price-range-body">
            <div class="price-radio-bg">
                @if($prices = get_prices())
                @foreach($prices as $key => $price)
                <div class="price-radio">
                    <input type="radio" id="price{{$key}}" name="price-range" value="{{$key}}">
                    <label for="price{{$key}}">{{$price}}</label>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>

</div>