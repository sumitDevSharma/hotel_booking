<?php

use \Illuminate\Support\Str;
use MongoDB\BSON\UTCDateTime;
use Carbon\Carbon;



// Now $carbonDate contains the date in Carbon format

function template($asset = false)
{
    $activeTheme = config('basic.theme');
    if ($asset) return 'themes/' . $activeTheme . '/';
    return 'themes.' . $activeTheme . '.';
}

function days_in_month($month, $year)
{
// calculate number of days in a month
    return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}

function recursive_array_replace($find, $replace, $array)
{
    if (!is_array($array)) {
        return str_replace($find, $replace, $array);
    }
    $newArray = [];
    foreach ($array as $key => $value) {
        $newArray[$key] = recursive_array_replace($find, $replace, $value);
    }
    return $newArray;
}

function menuActive($routeName, $type = null)
{
    $class = 'active';
    if ($type == 3) {
        $class = 'selected';
    } elseif ($type == 4) {
        $class = 'show';
    } elseif ($type == 2) {
        $class = 'has-arrow active';
    } elseif ($type == 1) {
        $class = 'in';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}


function getFile($image, $clean = '')
{   
   
    return file_exists(public_path($image)) && is_file(public_path($image)) ? asset($image) . $clean : asset(config('location.default'));
}

function getProfilePic($image, $clean = '', $name = '')
{
    return file_exists(public_path($image)) && is_file(public_path($image)) ? asset($image) . $clean : 'https://ui-avatars.com/api/?size=256&name=' . $name.'&background=ffc107&color=fff&=true';
}

function getFileCover($image, $clean = '')
{
    return file_exists(public_path($image)) && is_file(public_path($image)) ? asset($image) . $clean : asset(config('location.defaultCover'));
}

function removeFile($path)
{
    return file_exists(public_path($image)) && is_file(public_path($image)) ? @unlink($path) : false;
}

function loopIndex($object)
{
    return ($object->currentPage() - 1) * $object->perPage() + 1;
}

function getAmount($amount, $length = 0)
{
    if (0 < $length) {
        return number_format($amount + 0, $length);
    }
    return $amount + 0;
}


if (!function_exists('getRoute')) {
    function getRoute($route, $params = null)
    {
        return isset($params) ? route($route, $params) : route($route);
    }
}


if (!function_exists('isMenuActive')) {
    function isMenuActive($routes, $type = 0)
    {
        $class = [
            '0' => 'active',
            '1' => 'style=display:block',
            '2' => true
        ];

        if (is_array($routes)) {
            foreach ($routes as $key => $route) {
                if (request()->routeIs($route)) {
                    return $class[$type];
                }
            }
        } elseif (request()->routeIs($routes)) {
            return $class[$type];
        }

        if ($type == 1){
            return 'style=display:none';
        }
        else{
            return false;
        }
    }
}
if (!function_exists('getTitle')) {
    function getTitle($title)
    {
        return ucwords(preg_replace('/[^A-Za-z0-9]/', ' ', $title));
    }
}





function strRandom($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function diffForHumans($date)
{
    if($date == null){
        return '';
    }
    $lang = session()->get('lang');
    \Carbon\Carbon::setlocale($lang);
    // date is in timestamp format
   
    $dateTime = $date->toDateTime()->format('Y-m-d H:i:s');
    return Carbon::parse($dateTime)->diffForHumans();
}

function formatDate($date)
{   
    if($date == null){
        return '';
    }   
    $lang = session()->get('lang');
    \Carbon\Carbon::setlocale($lang);

    return $date->toDateTime()->format('Y-m-d H:i:s');
    
}

function dateTime($date, $format = 'd M, Y h:i A')
{
    return date($format, strtotime($date));
}

if (!function_exists('putPermanentEnv')) {
    function putPermanentEnv($key, $value)
    {
        $path = app()->environmentFilePath();
        $escaped = preg_quote('=' . env($key), '/');
        file_put_contents($path, preg_replace(
            "/^{$key}{$escaped}/m",
            "{$key}={$value}",
            file_get_contents($path)
        ));
    }
}

function checkTo($currencies, $selectedCurrency = 'USD')
{
    foreach ($currencies as $key => $currency) {
        if (property_exists($currency, strtoupper($selectedCurrency))) {
            return $key;
        }
    }
}

function code($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}

function invoice()
{

    return time() . code(4);
}

function wordTruncate($string, $offset = 0, $length = null): string
{
    $words = explode(" ", $string);
    isset($length) ? array_splice($words, $offset, $length) : array_splice($words, $offset);
    return implode(" ", $words);
}

function linkToEmbed($string)
{
    if (strpos($string, 'youtube') !== false) {
        $words = explode("/", $string);
        if (strpos($string, 'embed') == false) {
            array_splice($words, -1, 0, 'embed');
        }
        $words = str_ireplace('watch?v=', '', implode("/", $words));
        return $words;
    }
    return $string;
}


function slug($title)
{
    return \Illuminate\Support\Str::slug($title);
}

function title2snake($string)
{
    return Str::title(str_replace(' ', '_', $string));
}

function snake2Title($string)
{
    return Str::title(str_replace('_', ' ', $string));
}

function kebab2Title($string)
{
    return Str::title(str_replace('-', ' ', $string));
}

function getLevelUser($wallet_address)
{
    $ussss = new \App\Models\User();
    return $ussss->referralUsers([$wallet_address]);
}

function getPercent($total, $current)
{
    if ($current > 0 && $total > 0) {
        $percent = (($current * 100) / $total) ?: 0;
    } else {
        $percent = 0;
    }
    return round($percent, 0);
}

function flagLanguage($data)
{
    return '{' . rtrim($data, ',') . '}';
}

function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);

    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;


    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');

    return $data;
}


function resourcePaginate($data, $callback)
{
    return $data->setCollection($data->getCollection()->map($callback));
}


function clean($string)
{
    $string = str_replace(' ', '_', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function camelToWord($str)
{
    $arr = preg_split('/(?=[A-Z])/', $str);
    return trim(join(' ', $arr));
}


function in_array_any($needles, $haystack)
{
    return (bool)array_intersect($needles, $haystack);
}


function adminAccessRoute($search)
{
    $list = collect(config('role'))->pluck('access')->flatten()->intersect(
        auth()->guard('admin')->user()->admin_access
    );


    if (is_array($search)) {
        $list = $list->intersect($search);
        if (0 < count($list)) {
            return true;
        }
        return false;
    } else {

        return $list->search(function ($item) use ($search) {
            if ($search == $item) {
                return true;
            }
            return false;
        });
    }
}

if (!function_exists('getProjectDirectory')) {
    function getProjectDirectory()
    {
        return str_replace((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]", "", url("/"));
    }
}
if (!function_exists('sortWalletAddress')) {
    function sortWalletAddress($wallet_address,$length = 15)
    {
        return strtolower(substr_replace($wallet_address,'...........', $length, -5));
    }
}


if (!function_exists('generateETHScanAddressLink')) {
    /**
     * Generate an anchor (a) tag to link to a TronScan address page.
     *
     * @param string $address
     * @param string $linkText (Optional) The text to display in the link. Default is the address.
     * @param array $attributes (Optional) Additional HTML attributes for the anchor tag.
     * @return string
     */
    function generateETHScanAddressLink($address, $linkText = null,$type = null, array $attributes = []) {
        // The base URL for TronScan address pages.
        $contract = (object)config('contract.' . config('contract.default'));
        $url = $contract->url;
        if($address == ''){
            return '';
        }
        if($type == 'contract'){
            $baseUrl = $contract->url.'/address/';
        }
        else if($type == 'token'){
            $baseUrl = $contract->url.'/token/';
        }
        else if($type == 'hash'){
            $baseUrl = $contract->url.'/tx/';
        }
        else{
            $baseUrl = $contract->url.'/address/';
        }
       
        // If $linkText is not provided, use the address as the link text.
        $linkText = $linkText ?? $address;
        
        // Build the anchor tag with the address as the href attribute.
        $attributes['href'] = $baseUrl . $address;
        $attributeString = '';

        // Convert additional attributes to HTML attribute format.
        foreach ($attributes as $key => $value) {
            $attributeString .= " {$key}='{$value}'";
        }
        

        return "<a target='_blank'{$attributeString}>".sortWalletAddress($linkText)."</a><svg xmlns='http://www.w3.org/2000/svg' width='17' height='17' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-copy link-copy' data-text='{$address}'><rect x='9' y='9' width='13' height='13' rx='2' ry='2'/><path d='M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1'/></svg></i>";
    }
}

function status($status)
{
    if ($status == 1) {
        return '<span class="badge badge-success">Active</span>';
    } else if($status == 2 || $status == 0){
        return '<span class="badge badge-danger">Inactive</span>';
    }else if($status == 3){
        return '<span class="badge badge-warning">Pending</span>';
    }else if($status == 4){
        return '<span class="badge badge-info">Processing</span>';
    }else if($status == 5){
        return '<span class="badge badge-primary">Completed</span>';
    }

}

function asset_path($path)
{
    // get ASSET_PATH from .env
    return env('ASSET_PATH', public_path()) . $path;
}

function asset_url($path)
{
    // get ASSET_PATH from .env
    return env('APP_ASSET_URL', asset('/')) . $path;
}



