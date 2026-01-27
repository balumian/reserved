$("#admin-add-customer").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        email: {
            required: true,
            email: true,
            maxlength: 255
        } 
    },
    messages: {
        name: {
            required: 'Enter your full name',
            minlength: 'Name should be at least 3 characters',
            maxlength: 'Name maximum length 255 characters',
        },
        email: {
            required: 'Enter your email address',
            email: 'Your email address is incorrect',
            maxlength: 'Email maximum length 255 characters'
        } 
    }
});
$("#admin-business-profile").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        email: {
            required: true,
            email: true,
            maxlength: 255
        } 
    },
    messages: {
        name: {
            required: 'Enter your full name',
            minlength: 'Name should be at least 3 characters',
            maxlength: 'Name maximum length 255 characters',
        },
        email: {
            required: 'Enter your email address',
            email: 'Your email address is incorrect',
            maxlength: 'Email maximum length 255 characters'
        } 
    }
});
$("#user-update").validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true
        },
    },
    messages: {
        name: {
            required: "Enter your full name",
        },
        email: {
            required: 'Enter your email address',
            email: 'Your email address is incorrect'
        }
    }
})

$("#business-user-update").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        email: {
            required: true,
            email: true,
            maxlength: 255
        },
        nationality:{
            required: true
        },
        emirate: {
            required: true
        },
        phone: {
            required: true
        },
        area: {
            required: true
        }
    },
    messages: {
        name: {
            required: 'Enter your full name',
            minlength: 'Name should be at least 3 characters',
            maxlength: 'Name maximum length 255 characters',
        },
        email: {
            required: 'Enter your email address',
            email: 'Your email address is incorrect',
            maxlength: 'Email maximum length 255 characters'
        },
        nationality:{
            required: 'Select your nationality'
        },
        emirate: {
            required: 'Select your emirate'
        },
        phone: {
            required: 'Phone number is required'
        },
        area: {
            required: 'Area field is required'
        }
    }
})

$("#password-update").validate({
    rules: {
        password: {
            required: true,
            minlength:8
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        password: {
            required: 'Enter new password',
            minlength: 'Password length should be minimum 8 characters'
        },
        password_confirmation:{
            required: "Password confirmation is required",
        },
    }
})

$("#admin-add-country").validate({
    rules:{
        name: {
            required: true
        },
        iso: {
            required: true
        },
        code: {
            required: true
        }

    }
})
$("#admin-business-documents").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
        name_ar: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
    },
    messages: {
        name: {
            required: "Enter business name in english",
            minlength: "Business name should be at least 3 characters!",
            maxlength: "Business name maximum length is 255 characters"
        },
        name_ar: {
            required: "Enter business name in arabic",
            minlength: "Business name should be at least 3 characters!",
            maxlength: "Business name maximum length is 255 characters"
        }
    }
    
});
$("#bussiness-wizard-account").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
        email: {
            required: true,
            email: true,
            maxlength: 255,
        },
        password: {
            required: true,
            minlength:8
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        name: {
            required: "Enter your full name",
            minlength: "Name should be at least 3 characters!",
            maxlength: "Name maximum length is 255 characters"
        },
        email: {
            required: 'Enter your email address',
            email: 'Your email address is incorrect',
            maxlength: "Email maximum length is 255 characters"
        },
        password: {
            required: 'Enter new password',
            minlength: 'Password length should be minimum 8 characters'
        },
        password_confirmation:{
            required: "Password confirmation is required",
        },
    }
})

$("#bussiness-account").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
        email: {
            required: true,
            email: true,
            maxlength: 255,
        },
        password: {
            required: true,
            minlength:8
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        name: {
            required: "Enter your full name",
            minlength: "Name should be at least 3 characters!",
            maxlength: "Name maximum length is 255 characters"
        },
        email: {
            required: 'Enter your email address',
            email: 'Your email address is incorrect',
            maxlength: "Email maximum length is 255 characters"
        },
        password: {
            required: 'Enter new password',
            minlength: 'Password length should be minimum 8 characters'
        },
        password_confirmation:{
            required: "Password confirmation is required",
        },
    }
});

$("#bussiness-wizard-address").validate({
    rules: {
        nationality: {
            required: true,
        },
        phone: {
            required: true,
            maxlength: 10
        },
        emirate: {
            required: true,
        },
        area: {
            required: true,
        }
    },
    messages: {
        nationality: {
            required: 'Nationality field is required',
        },
        phone: {
            required: 'Phone field is required',
            maxlength: 'Phone number maximum length is 10 digits'
        },
        emirate: {
            required: 'Emirates field is required',
        },
        area: {
            required: 'Area field is required',
        }
    }
});
$("#bussiness-address").validate({
    rules: {
        nationality: {
            required: true,
        },
        phone: {
            required: true,
            maxlength: 10
        },
        emirate: {
            required: true,
        },
        area: {
            required: true,
        }
    },
    messages: {
        nationality: {
            required: 'Nationality field is required',
        },
        phone: {
            required: 'Phone field is required',
            maxlength: 'Phone maximum length is 10 digits'
        },
        emirate: {
            required: 'Emirates field is required',
        },
        area: {
            required: 'Area field is required',
        }
    }
});
$("#bussiness-wizard-documents").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        name_ar: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        residence_front:{
            required: true,
        },
        residence_back:{
            required: true,
        },
        passport:{
            required: true,
        },
        trade_license: {
            required : true,
        }
    },
    messages:{
        name: {
            required: "Enter business name in english",
            minlength: "Business name should be at least 3 characters",
            maxlength: "Business name maximum length is 255 characters"
        },
        name_ar: {
            required: "Enter business name in arabic",
            minlength: "Business name should be at least 3 characters",
            maxlength: "Business name maximum length is 255 characters"
        },
        residence_front:{
            required: 'Upload residence id copy (front)',
        },
        residence_back:{
            required: 'Upload residence id copy (back)',
        },
        passport:{
            required: 'Upload passport copy',
        },
        trade_license: {
            required: 'Upload trade license/trade copy',
        }
    }
});
$("#bussiness-documents").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        name_ar: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        residence_front:{
            required: true,
        },
        residence_back:{
            required: true,
        },
        passport:{
            required: true,
        },
        trade_license: {
            required : true,
        }
    },
    messages:{
        name: {
            required: "Enter business name in english",
            minlength: "Business name should be at least 3 characters",
            maxlength: "Business name maximum length is 255 characters"
        },
        name_ar: {
            required: "Enter business name in arabic",
            minlength: "Business name should be at least 3 characters",
            maxlength: "Business name maximum length is 255 characters"
        },
        residence_front:{
            required: 'Upload residence id copy (front)',
        },
        residence_back:{
            required: 'Upload residence id copy (back)',
        },
        passport:{
            required: 'Upload passport copy',
        },
        trade_license: {
            required: 'Upload trade license/trade copy',
        }
    }
});
$("#business-documents").validate({
    rules: {
        name: {
            required: true,
            minlength: 3,
            maxlength: 255
        },
        name_ar: {
            required: true,
            minlength: 3,
            maxlength: 255
        }
         
    },
    messages:{
        name: {
            required: "Enter business name in english",
            minlength: "Business name should be at least 3 characters",
            maxlength: "Business name maximum length is 255 characters"
        },
        name_ar: {
            required: "Enter business name in arabic",
            minlength: "Business name should be at least 3 characters",
            maxlength: "Business name maximum length is 255 characters"
        }
        
    }
});
// Business Update Password
$("#business-password-update").validate({
    rules: {
        password: {
            required: true,
            minlength:8
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        password: {
            required: 'Enter new password',
            minlength: 'Password length should be minimum 8 characters'
        },
        password_confirmation:{
            required: "Password confirmation is required",
        },
    }
})

// Add Attractions

$("#add-attraction-form").validate({
    rules: {
        title: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
        title_ar: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
        stitle: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
        stitle_ar: {
            required: true,
            minlength: 3,
            maxlength: 255,
        },
        phone: {
            required: true,
            minlength: 7,
            maxlength: 10,
        },
        price: {
            required: true,
        },
        emirate: {
            required: true,
        },
        area: {
            required: true
        }
    },
    messages: {
        title: {
            required: 'Title in english is required',
            minlength: 'Title should be at least 3 characters',
            maxlength: 'Title maximum length 255 characters',
        },
        title_ar: {
            required: 'Title in arabic is required',
            minlength: 'Title should be at least 3 characters',
            maxlength: 'Title maximum length 255 characters',
        },
        stitle: {
            required: 'Sub Title in english is required',
            minlength: 'Sub Title should be at least 3 characters',
            maxlength: 'Sub Title maximum length 255 characters',
        },
        stitle_ar: {
            required: 'Sub Title in arabic is required',
            minlength: 'Sub Title should be at least 3 characters',
            maxlength: 'Sub Title maximum length 255 characters',
        },
        phone: {
            required: 'Phone number is required',
            minlength: 'Phone number should be at least 7 digits',
            maxlength: 'Phone number maximum length 10 digits',
        },
        price: {
            required: 'Price field is required',
        },
        emirate: {
            required: 'Emirate field is required',
        },
        area: {
            required: 'Area field is required'
        }
    }
})

$('#business-setup-setting').validate({
    rules:{
        type: {
            required: true
        },
        reservation_type:{
            required: true,
        },
        capacity: {
            required: true
        }

    },
    messages:{
        type: {
            required: 'Business Type is required'
        },
        reservation_type:{
            required: 'Reservation Type is required',
        },
        capacity: {
            required: 'Capacity (table or persons) is required'
        }

    }
    
})