@extends('layouts.admin')

@section('content')
        <div id="backend-feedback-info" class="admin-notification callout callout-info" style="display: none;">
            <p id="backend-feedback-text"></p>
        </div>

        <!-- Main content -->
        <section class="content {{ SiteSetting::getDeviceType() }}">
            <div class="row">
                <div class="col-md-{{ SiteSetting::getColumnWidth()}}">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Members Settings</h3>
                        </div>
                        <div class="box-body noselect">
                            <div class="form-group">
                                <h4>Registrations</h4>
                                <div class="form-group">
                                    {{-- <label>
                                        <input class="icheck_input" id="enable" type="checkbox">
                                        <span style="margin-left: 10px; font-weight: 400;">Anyone can register</span>
                                    </label> --}}
                                    <table class="table">
                                        <tr>
                                            <td style="width: 219px;">
                                                Who can register?
                                            </td>
                                            <td>
                                                <select id="role" class="form-control">
                                                    <option value="everyone">Everyone</option>
                                                    <option value="noone" selected="selected">No-One</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <h4>Basic Settings</h4>
                                <div class="form-group">
                                    <div class="form-group">
                                        <table class="table">
                                            <tr>
                                                <td style="width: 219px;">
                                                    Default New User Role
                                                </td>
                                                <td>
                                                    <select id="role" class="form-control">
                                                        <option value="member" selected="selected">Member</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    User Display Name
                                                </td>
                                                <td>
                                                    <select id="role" class="form-control">
                                                        <option value="fullname">First Name & Last Name</option>
                                                        <option value="fullname">Last Name & First Name</option>
                                                        <option value="username" selected="selected">Username</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <h4>Registration Options</h4>
                                <div class="form-group">
                                    <div class="form-group">
                                        <table class="table">
                                            <tr>
                                                <td style="width: 200px;">
                                                    Use Recaptcha on registration
                                                </td>
                                                <td>
                                                    {{-- <input class="icheck_input" type="checkbox" id="recaptcha"> --}}
                                                    <select id="recaptcha" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no" selected="selected">No</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 220px;">
                                                    Registration Status
                                                </td>
                                                <td>
                                                    <select id="role" class="form-control">
                                                        <option value="member">Auto Approve</option>
                                                        <option value="admin">Activate by Email</option>
                                                        <option value="admin">Require Admin Review</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Require First and Last Name?
                                                </td>
                                                <td>
                                                    {{-- <input class="icheck_input" id="fullname" type="checkbox"> --}}
                                                    <select id="fullname" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no" selected="selected">No</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Require a strong password?
                                                </td>
                                                <td>
                                                    {{-- <input class="icheck_input" id="strong_password" type="checkbox" checked> --}}
                                                    <select id="strong_password" class="form-control">
                                                        <option value="yes">Yes</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Blacklist Username Words
                                                </td>
                                                <td>
                                                    <textarea name="name" rows="6" cols="27" class="form-control">
admin
administrator
webmaster
support
staff</textarea>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>




                                <h4>Notfications</h4>
                                <div class="form-group">
                                    <table class="table">
                                        <tr>
                                            <td style="width: 220px;">
                                                New User Notification
                                            </td>
                                            <td>
                                                {{-- <input class="icheck_input" type="checkbox" id="new_user_notification" checked> --}}
                                                <select id="new_user_notification" class="form-control">
                                                    <option value="yes">Yes</option>
                                                    <option value="no" selected="selected">No</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="box-body noselect">
                                <button id="saveBtn" type="button" name="button" class="btn btn-primary">Save Settings</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection

@push('scripts')
    <script>



    </script>
@endpush
