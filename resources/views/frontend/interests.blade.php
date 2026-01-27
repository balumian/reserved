@extends('layouts.customer')
@section('title','Reserved :: My Profile')

@section('content')
<div class="col-lg-9 col-12">

    <div class="content-box-bg">
        <div class="page-heading animated fadeIn">
            <h2>My Interests</h2>
        </div>

        <div class="content-box animated fadeIn">
            <div class="my-intrests">
                <div class="row">

                    <div class="col-lg-12 col-12">

                        <div class="register-intrest-bg">
                            <h4>Emirates</h4>
                            <div class="interest-check">
                                <input type="checkbox" checked id="dubai" class="intrst-check-input" name="reg-interest"
                                    value="Dubai">
                                <label for="dubai" class="intrst-label">Dubai</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="sharjah" class="intrst-check-input" name="reg-interest"
                                    value="Sharjah">
                                <label for="sharjah" class="intrst-label">Sharjah</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="Abu-Dhabi" class="intrst-check-input" name="reg-interest"
                                    value="Abu Dhabi">
                                <label for="Abu-Dhabi" class="intrst-label">Abu Dhabi</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="ajman" class="intrst-check-input" name="reg-interest"
                                    value="Ajman">
                                <label for="ajman" class="intrst-label">Ajman</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="fujairah" class="intrst-check-input" name="reg-interest"
                                    value="Fujairah">
                                <label for="fujairah" class="intrst-label">Fujairah</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="RasKhaimah" class="intrst-check-input" name="reg-interest"
                                    value="Ras Al Khaimah">
                                <label for="RasKhaimah" class="intrst-label">Ras Al Khaimah</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="UmmQuwain" class="intrst-check-input" name="reg-interest"
                                    value="Umm Al Quwain">
                                <label for="UmmQuwain" class="intrst-label">Umm Al Quwain</label>
                            </div>

                        </div>

                        <div class="register-intrest-bg">
                            <h4>Areas</h4>

                            <div class="interest-check">
                                <input type="checkbox" checked id="dubai" class="intrst-check-input" name="reg-interest"
                                    value="Dubai">
                                <label for="dubai" class="intrst-label">Dubai</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="sharjah" class="intrst-check-input" name="reg-interest"
                                    value="Sharjah">
                                <label for="sharjah" class="intrst-label">Sharjah</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="Abu-Dhabi" class="intrst-check-input" name="reg-interest"
                                    value="Abu Dhabi">
                                <label for="Abu-Dhabi" class="intrst-label">Abu Dhabi</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="ajman" class="intrst-check-input" name="reg-interest"
                                    value="Ajman">
                                <label for="ajman" class="intrst-label">Ajman</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="fujairah" class="intrst-check-input" name="reg-interest"
                                    value="Fujairah">
                                <label for="fujairah" class="intrst-label">Fujairah</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="RasKhaimah" class="intrst-check-input" name="reg-interest"
                                    value="Ras Al Khaimah">
                                <label for="RasKhaimah" class="intrst-label">Ras Al Khaimah</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="UmmQuwain" class="intrst-check-input" name="reg-interest"
                                    value="Umm Al Quwain">
                                <label for="UmmQuwain" class="intrst-label">Umm Al Quwain</label>
                            </div>

                        </div>

                        <div class="register-intrest-bg">
                            <h4>Cuisines</h4>

                            <div class="interest-check">
                                <input type="checkbox" id="Arabic" class="intrst-check-input" name="reg-interest"
                                    value="Arabic">
                                <label for="Arabic" class="intrst-label">Arabic</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="pakistani" class="intrst-check-input" name="reg-interest"
                                    value="pakistani">
                                <label for="pakistani" class="intrst-label">Pakistani</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="indian" class="intrst-check-input" name="reg-interest"
                                    value="indian">
                                <label for="indian" class="intrst-label">Indian</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="mexican" class="intrst-check-input" name="reg-interest"
                                    value="mexican">
                                <label for="mexican" class="intrst-label">Mexican</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="chinese" class="intrst-check-input" name="reg-interest"
                                    value="chinese">
                                <label for="chinese" class="intrst-label">Chinese</label>
                            </div>

                            <div class="interest-check">
                                <input type="checkbox" id="colombian" class="intrst-check-input" name="reg-interest"
                                    value="colombian">
                                <label for="colombian" class="intrst-label">Colombian</label>
                            </div>


                            <div class="interest-check">
                                <input type="checkbox" id="french" class="intrst-check-input" name="reg-interest"
                                    value="french">
                                <label for="french" class="intrst-label">French</label>
                            </div>




                        </div>

                        <button type="submit" class="btn-green">UPDATE</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@stop