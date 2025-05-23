<?php

use Illuminate\Support\Facades\Route;
use League\Csv\Writer;
use App\Models\Permission;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Crypt;


//This will retun the route prefix of the routes for permission check
function get_permission_routes()
{
    return [
        'about.faq.',
        'service.',
        'contact.',
        'national_connection.',
        'wwcs.',
        'event.',
        'national_award.',
        'convocation.',
        'blog.',
        'settings.',
        'banner.',
        'member.',
        'icsb_profile.',
        'committee.',
        'president.',
        'sec_and_ceo.',
        'job_placement.',
        'cs_firm.',
        'recent_video.',
        'acts.',
        'exam_faq.',
        'assined_officer.',
        'sample_question_paper.',
        'testimonial.',
        'latest_news.',
        'pop_up.',
        'admission_corner.',
        'branch.',

    ];
}

//This will check the permission of the given route name. Can be used for buttons
function check_access_by_route_name($routeName = null): bool
{




    if ($routeName == null) {
        $routeName = Route::currentRouteName();
    }

    // Bypass Security For Single Pages
    if (str_starts_with($routeName, 'sp')) {
        if (!auth()->user()->can('single_pages')) {
            return false;
        } else {
            return true;
        }
    }



    $allowedPrefixes = get_permission_routes();

    $shouldCheckPermission = false;
    foreach ($allowedPrefixes as $prefix) {
        if (str_starts_with($routeName, $prefix)) {
            $shouldCheckPermission = true;
            break;
        }
    }

    if ($shouldCheckPermission) {
        $routeParts = explode('.', $routeName);
        $lastRoutePart = end($routeParts);

        if (!auth()->user()->can($lastRoutePart)) {
            return false;
        }
    }

    return true;
}

//This will export the permissions as csv for seeders
function createCSV($filename = 'permissions.csv'): string
{
    $permissions = Permission::all();

    $data = $permissions->map(function ($permission) {
        return [
            'name' => $permission->name,
            'guard_name' => $permission->guard_name,
        ];
    });

    $csv = Writer::createFromPath(public_path('csv/' . $filename), 'w+');

    $csv->insertOne(array_keys($data->first()));

    foreach ($data as $record) {
        $csv->insertOne($record);
    }

    return public_path('csv/' . $filename);
}

function storage_url($urlOrArray)
{
    if (is_array($urlOrArray) || is_object($urlOrArray)) {
        $result = '';
        $count = 0;
        $itemCount = count($urlOrArray);
        foreach ($urlOrArray as $index => $url) {

            $result .= asset('storage/' . $url);

            if ($count === $itemCount - 1) {
                $result .= '';
            } else {
                $result .= ', ';
            }
            $count++;
        }
        return $result;
    } else {
        return asset('storage/' . $urlOrArray);
    }
}

function pdf_storage_url($urlOrArray)
{
    if (is_array($urlOrArray) || is_object($urlOrArray)) {
        $result = '';
        $count = 0;
        $itemCount = count($urlOrArray);
        foreach ($urlOrArray as $index => $url) {

            $result .= asset('/laraview/#../storage/' . $url);

            if ($count === $itemCount - 1) {
                $result .= '';
            } else {
                $result .= ', ';
            }
            $count++;
        }
        return $result;
    } else {
        return asset('/laraview/#../storage/' . $urlOrArray);
    }
}

function member_image($url)
{
    return $url;
}

function timeFormate($time)
{
    $dateFormat = env('DATE_FORMAT', 'd-M-Y');
    $timeFormat = env('TIME_FORMAT', 'H:i A');
    return date($dateFormat . " " . $timeFormat, strtotime($time));
}

function availableTimezones()
{
    $timezones = [];
    $timezoneIdentifiers = DateTimeZone::listIdentifiers();

    foreach ($timezoneIdentifiers as $timezoneIdentifier) {
        $timezone = new DateTimeZone($timezoneIdentifier);
        $offset = $timezone->getOffset(new DateTime());
        $offsetPrefix = $offset < 0 ? '-' : '+';
        $offsetFormatted = gmdate('H:i', abs($offset));

        $timezones[] = [
            'timezone' => $timezoneIdentifier,
            'name' => "(UTC $offsetPrefix$offsetFormatted) $timezoneIdentifier",
        ];
    }

    return $timezones;
}


function generateRandomPassword()
{
    $length = 6;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $password;
}
function stringLimit($description, $limit = '50', $end = '...')
{
    $shortSrting = Str::limit($description, $limit, $end);
    return $shortSrting;
}
function member_id($id)
{
    $member_id = str_pad($id, 3, '0', STR_PAD_LEFT);
    return $member_id;
}
function removeHttpProtocol($url)
{
    return str_replace(['http://', 'https://'], '', $url);
}

function html_entity_decode_table($data)
{
    return strip_tags(html_entity_decode($data));
}

function formatDateTimeRange($start_time, $end_time = null)
{
    $dateFormat = env('DATE_FORMAT', 'd-M-Y');
    $timeFormat = env('TIME_FORMAT', 'H:i A');
    $start = Carbon::parse($start_time);


    // If the dates are the same, format the time range as "start_time - end_time"
    if ($end_time == null) {
        return $start->format($dateFormat . " " . $timeFormat);
    } else {
        $end = Carbon::parse($end_time);
        if ($start->isSameDay($end)) {
            return $start->format($dateFormat . " " . $timeFormat) . ' - ' . $end->format($timeFormat);
        } else {
            // If the dates are different, format the time range as "start_time - end_time"
            return $start->format($dateFormat . " " . $timeFormat) . ' - ' . $end->format($dateFormat . " " . $timeFormat);
        }
    }
}
function formatYearRange($start_time, $end_time)
{
    $dateFormat = env('DATE_FORMAT', 'Y');
    $start = Carbon::parse($start_time);
    if ($end_time != null) {
        $end = Carbon::parse($end_time);
        return $start->format($dateFormat) . ' - ' . $end->format($dateFormat);
    } else {
        return $start->format($dateFormat) . " - Running";
    }
}

function settings($key)
{
    $setting = SiteSetting::where('key', $key)->where('deleted_at', null)->first();
    if ($setting) {
        return $setting->value;
    }
}
// function getYoutubeVideoIframe($url) {
//     $videoId = '';
//     parse_str(parse_url($url, PHP_URL_QUERY), $params);
//     if (isset($params['v'])) {
//         $videoId = $params['v'];
//     }
//     $iframe = '<iframe width="100%" height="280" src="https://www.youtube.com/embed/'.$videoId.'" frameborder="0" allowfullscreen></iframe>';
//     return $iframe;
// }
// function getSinglePageLebel($fieldName){

//     $withSpaces = str_replace('_', ' ', $fieldName);
//     $capitalized = ucwords($withSpaces);
//     return $capitalized;
// }
function getMemberImage($object)
{
    if ($object->image) {
        return $object->image;
    } else {
        // if($object->gender == 'Male'){
        //     return 'Male Image';
        // }else{
        //     return 'Female Image';
        // }
        return asset('no_img/no_img.jpg');
    }
}


function file_name_from_url($url = null)
{
    if ($url) {
        $fileNameWithExtension = basename($url);
        return $fileNameWithExtension;
    }
}


function file_title_from_url($url = null)
{
    if ($url) {
        $fileTitle = pathinfo($url, PATHINFO_FILENAME);
        return $fileTitle;
    }
}


// function delete_url($urlOrArray){
//     if (is_array($urlOrArray) || is_object($urlOrArray)) {
//         $result = '';
//         $itemCount = count($urlOrArray);
//         foreach ($urlOrArray as $index => $url) {
//             $result .= asset('storage/'.$url);

//             if($index === $itemCount - 1) {
//                 $result .= '';
//             }else{
//                 $result .= ', ';
//             }
//         }
//         return $result;
//     } else {
//         return asset('storage/'.$urlOrArray);
//     }
// }
function extractStringFromUrl($url)
{
    $social_medias = ['facebook', 'twitter', 'linkedin', 'instagram', 'youtube', 'pinterest', 'google', 'tiktok', 'telegram', 'whatsapp', 'reddit'];
    foreach ($social_medias as $media) {
        if (Str::contains($url, $media)) {
            return Str::ucfirst($media);
        }
    }
}

function make_slug($data)
{
    return Str::slug($data);
}
function encryptId($id)
{
    return Crypt::encrypt($id);
}
function decryptId($id)
{
    return Crypt::decrypt($id);
}
