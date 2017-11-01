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
                            <h3 class="box-title">Website Settings</h3>
                        </div>
                        <div class="box-body noselect">
                            <div class="form-group">
                                <table class="table">
                                    <tr>
                                        <td style="width: 150px;">
                                            Title
                                        </td>
                                        <td>
                                            <input type="text" placeholder="Website title" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tagline
                                        </td>
                                        <td>
                                            <input type="text" placeholder="Website tagline" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Site Url
                                        </td>
                                        <td>
                                            <input type="text" placeholder="www.website.com" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            <input type="text" placeholder="admin@gmail.com" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Website Language
                                        </td>
                                        <td>
                                            <select class="form-control">
                                                <option value="english">English</option>
                                                <option value="english">German</option>
                                                <option value="english">French</option>
                                                <option value="english">Italian</option>
                                                <option value="english">Spanish</option>
                                                <option value="english">Swedish</option>
                                                <option value="english">Danish</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
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
