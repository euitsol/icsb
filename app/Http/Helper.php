<?php

use Illuminate\Support\Facades\Route;
use League\Csv\Writer;
use App\Models\Permission;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\SiteSetting;


//This will retun the route prefix of the routes for permission check
function get_permission_routes()
{
  return ['about.faq.','service.','contact.','national_connection.','wwcs.','event.','national_award.', 'blog.', 'settings.','banner.', 'member.'];
}

//This will check the permission of the given route name. Can be used for buttons
function check_access_by_route_name($routeName = null): bool
{
    if($routeName == null){
        $routeName = Route::currentRouteName();
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

function storage_url($url){
    return asset('storage/'.$url);
}
function timeFormate($time){
    $dateFormat = env('DATE_FORMAT', 'd-M-Y');
    $timeFormat = env('TIME_FORMAT', 'H:i A');
    return date($dateFormat." ".$timeFormat, strtotime($time));
}

function availableTimezones(){
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


function generateRandomPassword() {
    $length = 6;
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $password;
}
function stringLimit($description, $limit = '50', $end = '...'){
    $shortSrting = Str::limit($description, $limit, $end);
    return $shortSrting;
}
function member_id($id){
    $member_id = str_pad($id, 4, '0', STR_PAD_LEFT);
    return $member_id;
}
function removeHttpProtocol($url)
{
    return str_replace(['http://', 'https://'], '', $url);
}

function html_entity_decode_table($data){
    return strip_tags(html_entity_decode($data));
}

function formatDateTimeRange($start_time, $end_time)
{
    $dateFormat = env('DATE_FORMAT', 'd-M-Y');
    $timeFormat = env('TIME_FORMAT', 'H:i A');
    $start = Carbon::parse($start_time);
    $end = Carbon::parse($end_time);

    // If the dates are the same, format the time range as "start_time - end_time"
    if ($start->isSameDay($end)) {
        return $start->format($dateFormat." ".$timeFormat) . ' - ' . $end->format($timeFormat);
    } else {
        // If the dates are different, format the time range as "start_time - end_time"
        return $start->format($dateFormat." ".$timeFormat) . ' - ' . $end->format($dateFormat." ".$timeFormat);
    }
}

function settings($key){
    $settings = SiteSetting::where('key',$key)->where('deleted_at', null)->first();
    return $settings->value;
}
function getYoutubeVideoId($url) {
    $videoId = '';
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    if (isset($params['v'])) {
        $videoId = $params['v'];
    }
    return $videoId;
}
