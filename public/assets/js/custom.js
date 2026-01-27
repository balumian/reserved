$(document).ready(function(){
    $(".toast").delay(5000).queue(function() {
        $(this).hide();
        $(this).dequeue();
    });
    
    // $('#my-side-menu .side-nav-item').click(function(){
    //     $('#my-side-menu .side-nav-item').removeClass('active');
    // })
});
// User Profile Pic upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.pro-pic')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}