<?php

use App\Models\Amenities;
use App\Models\Areas;
use App\Models\BusinessPackage;
use App\Models\BusinessTypes;
use App\Models\Countries;
use App\Models\Emirates;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Notifications\CustomerInfo;
use App\Notifications\PasswordChanged;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Notifications\BusinessInfo;
use App\Notifications\NewBusiness;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Cuisines;
use App\Models\Experience;
use App\Models\Feature;
use App\Models\Price;
use App\Models\Theme;
use App\Models\User;
use App\Models\WeekDays;
use App\Notifications\BusinessPackageChange;
use Illuminate\Support\Facades\Notification;

// Date format
function format_date($date, $format)
{
    // Generate format
    $formated = Carbon::parse($date)->format($format);
    return $formated;
    // Call Example
    // format_date($date,'d/m/Y')
}

// Get User Custom Avatar by Name
function get_custom_avatar($name = null)
{
    if ($name) {
        $str = explode(" ", $name);
        $custom = "";
        if (count($str) > 1) {
            $str1 = $str[0];
            $str2 = $str[1];
            $custom = $str1[0] . $str2[0];
        } else {
            $str1 = $str[0];
            $custom = $str1[0];
        }
        return $custom;
    } else {
        return "R";
    }
}

// Generate Strong password key
function generate_strong_key($length)
{
    $pass = Hash::make(Str::random($length));
    return $pass;
}

// Customer email of their credentials

function customer_info_email($user)
{
    $con = $user->notify(new CustomerInfo($user));
    if ($con) {
        return true;
    } else {
        return false;
    }
}

// Business email of their credentials

function business_info_email($user, $data)
{
    $con = $user->notify(new BusinessInfo($data));
    if ($con) {
        return true;
    } else {
        return false;
    }
}

// New Business Register Admin notification


function new_business_admin_email($data)
{
    $email = env('ADMIN_NOTIFICATIONS', 'info@re-served.ae');
    if ($email) {
        Notification::route('mail', $email)->notify(new NewBusiness($data));
    }
}

// Customer email of their credentials

function password_changed_email($user)
{
    $con = $user->notify(new PasswordChanged($user));
    if ($con) {
        return true;
    } else {
        return false;
    }
}

// Customer email of their credentials

function package_changed_request_email($user, $data)
{
    $con = $user->notify(new BusinessPackageChange($data));
    if ($con) {
        return true;
    } else {
        return false;
    }
}

//  File upload  

function store_files($request = null, $name, $folder)
{
    $file = $request->file($name);
    // extension
    $extension = $file->getClientOriginalExtension();
    // Name
    $name = $name . '-' . time();
    // Generate a file name with extension
    $fileName = $name . '.' . $extension;
    // Save the file
    $path = $file->storeAs($folder, $fileName, 'public');
    // 
    Media::create([
        'name' => $name,
        'extension' => $extension,
        'path' => $path,
        'created_by' => $request->user() ? $request->user()->id : null
    ]);
    return $path;
}

//  File upload  

function multi_files_store($request, $file, $name, $folder, $key)
{
    // extension
    $extension = $file->getClientOriginalExtension();
    // Name
    $name = $name . '-' . time() . $key;
    // Generate a file name with extension
    $fileName = $name . '.' . $extension;
    // Save the file
    $path = $file->storeAs($folder, $fileName, 'public');
    // 
    Media::create([
        'name' => $name,
        'extension' => $extension,
        'path' => $path,
        'created_by' => $request->user()->id
    ]);

    return $path;
}

function checkIsNull($var)
{
    if (!is_null($var)) {
        return $var;
    } else {
        return "";
    }
}
//  Get attribute translation
function getAttributeTranslated($item, $name)
{
    $arr = $item->getTranslations($name);
    if (count($arr) > 0) {
        return isset($arr['ar']) ? $arr['ar'] : '';
    } else {
        return "";
    }
}

function get_file_path($var = null)
{
    if ($var) {
        $path =  pathinfo($var);
        return $path['dirname'];
    }
    return "";
}

function get_file_name($var = null)
{
    if ($var) {
        return  basename($var);
    }
    return "";
}

function get_nationality($id = null)
{
    if ($id) {
        if ($id == "1") {
            return "United Arab Emirates";
        } elseif ($id == "2") {
            return "Saudia Arabia";
        } elseif ($id == "3") {
            return "India";
        } elseif ($id == "4") {
            return "Pakistan";
        } else {
            return 'N/A';
        }
    } else {
        return "";
    }
}

function get_emirates($id = null)
{
    if ($id) {
        if ($id == "1") {
            return "Abu Dhabi";
        } elseif ($id == "2") {
            return "Dubai";
        } elseif ($id == "3") {
            return "Sharjah";
        } elseif ($id == "4") {
            return "Ajman";
        } elseif ($id == "5") {
            return "Umm Al Quwain";
        } elseif ($id == "6") {
            return "Ras Al Khaimah";
        } elseif ($id == "7") {
            return "Fujairah";
        } else {
            return '';
        }
    } else {
        return "";
    }
}

function get_dialing_code()
{
    $code = Countries::where('code', '!=', '')->pluck('code')->unique()->sort();
    return $code;
}

function get_emirate($id = null)
{
    if ($id) {
        $emirate = Emirates::find($id);
        return $emirate->name;
    }

    return "";
}

// get nationalities
function get_nationalities($id = null)
{
    $country = Countries::find($id);
    if ($country) {
        return $country->name;
    } else {
        return 'N/A';
    }
}

// get Areas
function get_area($id = null)
{
    $area = Areas::find($id);
    if ($area) {
        return $area->name;
    } else {
        return 'N/A';
    }
}

// function User Path

function get_user_dashboard()
{
    $role = Auth::user()->user_type;
    //  Redirect Based on user type
    switch ($role) {
        case 'admin':
            return RouteServiceProvider::AdminDashboard;
            break;
        case 'customer':
            return RouteServiceProvider::CustomerDashboard;
            break;
        case 'business':
            return RouteServiceProvider::BusinessDashboard;
            break;
        default:
            return RouteServiceProvider::HOME;
            break;
    }
}

// Reservation Type
function reservation_types()
{
    return ['1' => 'General reservations', '2' => 'Table based booking'];
}
function get_reservation_type($id)
{
    $types = ['1' => 'General reservations', '2' => 'Table based booking'];

    return $types[$id];
}
// Cuisines
function get_cuisines()
{
    $cuisines = Cuisines::active()->pluck('title', 'id');
    return $cuisines;
}
// Cuisines
function cuisines()
{
    $cuisines = Cuisines::active()->get();
    return $cuisines ? $cuisines : [];
}
// Themes
function get_themes()
{
    $themes = Theme::active()->pluck('title', 'id');
    return $themes;
}

// Amenities
function get_amenities()
{
    $amenities = Amenities::active()->pluck('title', 'id');
    return $amenities;
}

// Experiences
function get_experiences()
{
    $experiences = Experience::active()->pluck('title', 'id');
    return $experiences;
}

// Experiences
function experiences()
{
    $experiences = Experience::active()->get();
    return $experiences;
}
// Special Features
function get_features()
{
    $features = Feature::active()->pluck('title', 'id');
    return $features;
}


// Special Features
function get_prices()
{
    $prices = Price::active()->pluck('price', 'id');
    return $prices;
}
// Business Packages

function get_packages()
{
    $packages = BusinessPackage::active()->get();
    return $packages;
}

// Business Emirates

function emirates()
{
    $emirates = Emirates::active()->get();
    return $emirates;
}
//  Areas
function areas()
{
    $areas = Areas::active()->get();
    return $areas;
}

function nationalities()
{
    $countries = Countries::active()->get();
    return $countries;
}

function get_area_by_emirate($id = null)
{
    if ($id) {
        $emirate = Emirates::find($id);
        return $emirate->areas;
    }
    return [];
}

// get week days

function days()
{
    $days = WeekDays::all();
    return $days;
}

// get packages

function packages()
{
    $packages = BusinessPackage::active()->get();
    return $packages;
}

// get Business Settings (Cuisiness)

function spec_business_settings($obj = null, $id = null)
{
    if ($obj && $id) {
        foreach ($obj as $dataID) {
            if ($dataID == $id) {
                return 'selected';
            }
        }
    }
    return '';
}

// get Business Types

function get_business_types()
{
    $types = BusinessTypes::active()->get();
    return $types ? $types : [];
}

//  File upload  

function store_files_with_thumbnail($request = null, $name, $folder)
{
    $file = $request->file($name);
    // extension
    $extension = $file->getClientOriginalExtension();
    // Name
    $name = $name . '-' . time();
    // Generate a file name with extension
    $fileName = $name . '.' . $extension;

    //small thumbnail name
    $thumbnail = '_thumb_' . $fileName;
    // Save the file
    $path = $file->storeAs($folder, $fileName, 'public');
    // Store Thumbnail
    $temp = $file->storeAs($folder . '/thumbnail', $thumbnail, 'public');

    $thumb = 'storage/' . $temp;
    // Create Thumbnail
    $thumbPath = Image::make($thumb)->resize(150, 150, function ($constraint) {
        $constraint->aspectRatio();
    });
    $thumbPath->save($thumb);
    // 
    $media = new Media();

    $media->name = $name;
    $media->extension = $extension;
    $media->path = $path;
    $media->thumbnail = $thumb;
    $media->created_by = $request->user() ? $request->user()->id : null;
    $media->save();
    return $media->id;
}
