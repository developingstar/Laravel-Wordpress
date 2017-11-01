<?php

namespace App\Http\Controllers\Backend\Core\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Core\Settings\SiteSetting;

class MembersController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSection('Members');
        return view('core.settings.members.index', compact('settings'));
    }

    public function save(Request $request)
    {
        if($request->ajax()) {
            foreach ($request->except('_token') as $key => $value) {
                SiteSetting::set('Members', $key, $value);
            }

            return response()->json([
                'status' => 'success',
            ], 201);
        }
    }
}
