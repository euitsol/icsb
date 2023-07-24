<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Config;

class SettingsController extends Controller
{
    //

    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $SiteSettings = SiteSetting::pluck('value', 'key')->all();
        $availableTimezones = availableTimezones();
        return view('backend.settings.index', ['availableTimezones' => $availableTimezones, 'SiteSettings' => $SiteSettings]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->all();
        unset($data['_token']);

		$envPath = base_path('.env');
		$env = file($envPath);

        foreach ($data as $key => $value){
            try {
                if($key == 'site_logo' || $key == 'site_favicon'){
                    if ($request->hasFile('site_logo')) {
                        $image = $request->file('site_logo');
                        $path = $image->store('site-settings', 'public');
                        $key = 'site_logo';
                        $value = $path;
                        $siteSetting = SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
                    }elseif($request->hasFile('site_favicon')){
                        $image = $request->file('site_favicon');
                        $path = $image->store('site-settings', 'public');
                        $key = 'site_favicon';
                        $value = $path;
                        $siteSetting = SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
                    }
                }else{
                    $siteSetting = SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
                }

                // Config::set('settings.' . $key, $value);
                // $configPath = config_path('settings.php');
                // $configData = "<?php\n\nreturn " . var_export(config('settings'), true) . ";\n";
                // file_put_contents($configPath, $configData);

                if(!empty($siteSetting->env_key)){
                    $env = $this->set($siteSetting->env_key, '"'.$value.'"', $env);
                }


            }catch (Exception $e) {
                return redirect()->back()->withStatus( __($e->getMessage()) );
            }
        }

        $fp = fopen($envPath, 'w');
        fwrite($fp, implode($env));
        fclose($fp);


        return redirect()->back()->withStatus(__('Settings added successfully.'));
    }

    private function set($key, $value, $env)
	{
		foreach ($env as $env_key => $env_value) {
			$entry = explode("=", $env_value, 2);
			if ($entry[0] == $key) {
				$env[$env_key] = $key . "=" . $value . "\n";
			} else {
				$env[$env_key] = $env_value;
			}
		}
		return $env;
	}
}
