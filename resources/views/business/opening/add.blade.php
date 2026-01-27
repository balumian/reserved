@extends('business.layouts.app')
@section('css')
<link href="{{asset('admin/vendors/flatpickr/flatpickr.min.css')}}" rel="stylesheet" />
@stop
@section('content')

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->

<div class="card mb-3">
    <div class="card-header">
        <div class="row flex-between-end">
            <div class="col-auto align-self-center">
                <h5 class="mb-0">Opening & Closing</h5>
            </div>
        </div>
    </div>
    <div class="card-body bg-light">
        <div class="row">
            <div class="col-lg-8">
                <form action="{{route('business.opening.store')}}" method="post">
                    <!-- <input type="hidden" name="open" id="opentime">
                    <input type="hidden" name="close" id="closetime"> -->
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="form-label" for="day">Day </label>
                                    <div class="input-group mb-3">
                                        <select class="form-select" name="day" id="day" required>
                                            @foreach(days() as $day)
                                            <option value="{{$day->id}}">{{$day->day}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="working">Day Status </label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" id="status" type="checkbox" checked="" name="working" id="working" onchange="handleWorking(this);" />
                                            <label class="form-check-label" for="status">Open</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 day">
                                    <div class="mb-3">
                                        <label class="form-label" for="open">Open Time</label>
                                        <input class="form-control datetimepicker" name="open" id="open" type="text" placeholder="Hours:Minutes" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                                    </div>
                                </div>
                                <div class="col-lg-6 day">
                                    <div class="mb-3">
                                        <label class="form-label" for="close">Close Time</label>
                                        <input class="form-control datetimepicker" name="close" id="close" type="text" placeholder="Hours:Minutes" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                                    </div>
                                </div>
                                <div class="col-lg-12 day">
                                    <div class="mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" id="status" type="checkbox" name="break" id="break" onchange="handleBreak(this)" />
                                            <label class="form-check-label" for="status">Break</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 break-time" style="display:none">
                                    <div class="mb-3">
                                        <label class="form-label" for="open">Break Start</label>
                                        <input class="form-control datetimepicker" name="break_start" id="break_start" type="text" placeholder="Hours:Minutes" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                                    </div>
                                </div>
                                <div class="col-lg-6 break-time" style="display:none">
                                    <div class="mb-3">
                                        <label class="form-label" for="close">Break End</label>
                                        <input class="form-control datetimepicker" name="break_end" id="break_end" type="text" placeholder="Hours:Minutes" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="status" type="checkbox" checked="" name="status" id="status" />
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<script src="{{asset('admin/assets/js/flatpickr.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendors/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">

function handleBreak(input){
    if($(input).is(':checked')){
        $('.break-time').show(500);
    }else{
        $('.break-time').hide(500);
    }
}

function handleWorking(input){
    if($(input).is(':checked')){
        $('.day').show(500);
    }else{
        $('.day').hide(500);
        $('.break-time').hide(500);
    }
}


 
</script>

@stop