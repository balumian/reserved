$(document).ready(function(){
//  Live Toast
$(".toast").delay(5000).queue(function() {
    $(this).hide();
    $(this).dequeue();
});
// Admin add new customer password option enable/disable
 $('#autopassword').click(function(){
    if ($('#autopassword input[name="autopassword"]').is(':checked')) {
         $('.customer-password').hide(500);
    }else{
        $('.customer-password').show(500);
    }
 });

//  Expand current Admin sidebar navigation
 var navLinks = $('.collapse .nav-link.dropdown-indicator');
 if(navLinks){
     $(navLinks).each(function(){
        $expID = $(this).attr('aria-controls');
        if($('#'+$expID).find('.nav-link').hasClass('active')){
            var link = $('#'+$expID)
            $(link).addClass('nav collapse show');
        }
     });
 }

    
});

//  File Upload

// User Profile Pic upload
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#customer-pro-pic')
                .attr('src', e.target.result)
        };

        reader.readAsDataURL(input.files[0]);
    }
} 


// User Profile Pic upload
function cuisineURLimg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#cuisine')
                .attr('src', e.target.result)
                .css('display','block')
                .css('margin','auto')
        };

        reader.readAsDataURL(input.files[0]);
    }
}


// User Profile Pic upload
function experienceURLimg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#experience')
                .attr('src', e.target.result)
                .css('display','block')
                .css('margin','auto')
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Read ID Front

// User Profile Pic upload
// function idFrontURLimg(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             $('#idfront')
//                 .attr('src', e.target.result)
//                 .css('display','block')
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
// }