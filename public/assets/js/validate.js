
// Login form
$("#cutomer-login").validate({
    rules:{
        email: {
            required: true,
            email: true
          },
        password: {
            required: true,
            minlength:8
        }      
    },
    messages:{
        email: {
            required: 'Email field is required',
            email: 'Your email address is incorrect'
          } ,
          password: {
            required: 'Password field is required',
            minlength: 'Password length should be minimum 8 characters'
        }       
    }
});
// Signup Form
$("#customer-signup").validate({
    rules:{
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
          },
        password: {
            required: true,
            minlength:8
        },
        password_confirmation:{
            required: true,
            equalTo: "#password"
        },
         
    },
    messages:{
        name: {
            required: 'Enter your full name'
        },
        email: {
            required: 'Email field is required',
            email: 'Your email address is incorrect'
        } ,
        password: {
            required: 'Password field is required',
            minlength: 'Password length should be minimum 8 characters'
        },
        password_confirmation:{
            required: "Password confirmation is required",
            equalTo: "Password not matched"
        },
                 
    }
});

$("#forget-password").validate({
    rules: {
        email: {
            required: true
        }
    },
    messages: {
        email: {
            required: 'Email field is required !'
        }
    }
});

$("#reset-password").validate({
    rules: {
        email: {
            required: true
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
        email: {
            required: 'Email field is required !'
        },
        password: {
            required: 'Password field is required',
            minlength: 'Password length should be minimum 8 characters'
        },
        password_confirmation:{
            required: "Password confirmation is required",
            equalTo: "Password not matched"
        },
    }
})

$("#customer-profile-update").validate({
    rules: {
        name: {
            required: true,
        },
        email: {
            required: true,
            email: true
        },
        phone: {
            required: true,
        },
        area: {
            required: true,
        },
        address: {
            required: true,
        }
    },
    messages: {
        name: {
            required: "Enter your full name",
        },
        email: {
            required: 'Enter your email address',
            email: 'Your email address is incorrect'
        },
        phone: {
            required: "Enter your phone number",
        },
        area: {
            required: "Enter your area",
        },
        address: {
            required: "Enter your address",
        }
    }
})