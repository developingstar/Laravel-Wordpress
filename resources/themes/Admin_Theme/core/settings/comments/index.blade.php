@extends('layouts.admin')

@section('content')
        <div id="backend-feedback-info" class="admin-notification callout callout-info" style="display: none;">
            <p id="backend-feedback-text"></p>
        </div>

        <!-- Content Header (Page header) -->
        {{-- @include('partials/breadcrumb') --}}

        <!-- Main content -->
        <section class="content {{ SiteSetting::getDeviceType() }}">
            <div class="row">
                <div class="col-md-{{ SiteSetting::getColumnWidth() }}">
                    <div class="box box-primary" style="min-height: 525px;">
                        <div class="box-header">
                            <h3 class="box-title">Comments Settings</h3>
                        </div>
                        <div class="box-body noselect">
                            <div class="form-group">
                                {{-- <div class="checkbox icheck">
                                    <label>
                                        <input class="icheck_input" id="enable" type="checkbox">
                                        <span style="margin-left: 10px;">Enable</span>
                                    </label>
                                    <select id="type" class="form-control" style="width: 100px;">
                                        <option id="native" value="native">native</option>
                                        <option id="disqus" value="disqus">disqus</option>
                                    </select> comments on this website.
                               </div> --}}
                               <h4>Enable Comments</h4>
                               <table class="table">
                                   <tr>
                                       <td style="width: 219px;">
                                           Comments type
                                       </td>
                                       <td>
                                           <select id="type" class="form-control">
                                               <option id="comments_disabled" value="disabled">Disable Comments</option>
                                               <option id="comments_native" value="native" selected="selected">Native</option>
                                               <option id="comments_disqus" value="disqus">Disqus</option>
                                           </select>
                                       </td>
                                   </tr>
                               </table>
                            </div>
                            <div id="native_basic_settings" class="form-group native_settings">
                                <h4>Settings</h4>
                                <div class="form-group">

                                    <div>
                                       <table class="table">
                                           <tr>
                                               <td style="width: 219px;">
                                                   Logged in to comment
                                               </td>
                                               <td>
                                                   <select id="must_be_registered" class="form-control">
                                                       <option value="yes" selected="selected">Yes</option>
                                                       <option value="no">No</option>
                                                   </select>
                                               </td>
                                           </tr>
                                           <tr>
                                               <td style="width: 219px;">
                                                   Allow nested comments
                                               </td>
                                               <td>
                                                   <select id="allow_nested" class="form-control">
                                                       <option value="yes">Yes</option>
                                                       <option value="no">No</option>
                                                   </select>
                                               </td>
                                           </tr>
                                           <tr>
                                               <td style="width: 219px;">
                                                   Nested level depth
                                               </td>
                                               <td>
                                                   <select id="nested_level" class="form-control">
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                       <option value="5">5</option>
                                                   </select>
                                               </td>
                                           </tr>

                                           <tr>
                                               <td style="width: 219px;">
                                                   Comments order
                                               </td>
                                               <td>
                                                   <select id="order" class="form-control">
                                                       <option value="asc">Oldest</option>
                                                       <option value="desc">Newest</option>
                                                   </select>
                                               </td>
                                           </tr>

                                           <tr>
                                               <td style="width: 219px;">
                                                   Moderation
                                               </td>
                                               <td>
                                                   <select id="must_approve" class="form-control">
                                                       <option value="yes">Yes</option>
                                                       <option value="no">No</option>
                                                   </select>
                                               </td>
                                           </tr>

                                           <tr>
                                               <td style="width: 219px;">
                                                   Moderation for approved users
                                               </td>
                                               <td>
                                                   <select id="allow_approved" class="form-control">
                                                       <option value="yes">Yes</option>
                                                       <option value="no" selected="selected">No</option>
                                                   </select>
                                               </td>
                                           </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div id="native_notifications" class="form-group native_settings">
                                <h4>Notifications</h4>
                                <div class="form-group" style="padding-left: 15px;">
                                    <div class="form-group">
                                        <div class="checkbox icheck">
                                            <label>
                                               <input class="icheck_input" id="email_admin_on_new_comments" type="checkbox"> <span style="margin-left: 10px;">Email admin when new comments are posted.</span>
                                           </label>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox icheck">
                                            <label>
                                               <input class="icheck_input" id="email_admin_on_moderation" type="checkbox"> <span style="margin-left: 10px;">Email admin when comment needs to be approved.</span>
                                           </label>
                                       </div>
                                    </div>
                                </div>
                            </div>

                            <div id="disqus_config" class="form-group native_settings" style="display: none;">
                                <label for="">Disqus Settings</label>
                                <div class="form-group" style="padding-left: 15px;">
                                    <div class="form-group">
                                        <div class="checkbox icheck">
                                            <label>
                                               <span>Disqus channel:</span> <input id="disqus_channel" type="text">
                                           </label>
                                       </div>
                                    </div>
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
        var enable = false
        var type = 'native'
        var nested_level = 1
        var order = 'oldest'

        console.log('type: '+type)
        console.log('nested_level: '+nested_level)
        console.log('order: '+order)

        $('#type').val(type)
        $('#nested_level').val(nested_level)
        $('#order').val(order)


        $('#native_basic_settings').show();

        // if(type == 'disqus' || enable == false) {
        //     $('#native_basic_settings').hide();
        //     $('#native_notifications').hide();
        //     $('#admin_comments_menu').show();
        // }

        // if(type == 'disqus') {
        //     $('#disqus_config').show();
        // }

        // $('#enable').on('ifUnchecked', function(event) {
        //     $('#native_basic_settings').hide();
        //     $('#native_notifications').hide();
        //     $('#disqus_config').hide();
        //     $('#admin_comments_menu').show();
        // });
        //
        // $('#enable').on('ifChecked', function(event) {
        //     if($("#type").find("option:selected").attr('id') == 'native') {
        //         $('#hide_comments_from_menu').iCheck('uncheck');
        //         $('#native_basic_settings').show();
        //         $('#native_notifications').show();
        //         $('#admin_comments_menu').hide();
        //         $('#disqus_config').hide();
        //     }
        //     if($("#type").find("option:selected").attr('id') == 'disqus') {
        //         $('#disqus_config').show();
        //     }
        // });


        // $("#type").change(function() {
        //     var id = $(this).find("option:selected").attr("id");
        //     console.log('changed: ' + id)
        //     switch (id) {
        //         case "native":
        //             if($("#enable").is(':checked')) {
        //                 $('#native_basic_settings').show();
        //                 $('#native_notifications').show();
        //                 $('#admin_comments_menu').hide();
        //             }
        //             $('#disqus_config').hide();
        //         break;
        //
        //         case "disqus":
        //             $('#native_basic_settings').hide();
        //             $('#native_notifications').hide();
        //             $('#admin_comments_menu').show();
        //             if($("#enable").is(':checked')) {
        //                 $('#disqus_config').show();
        //             }
        //         break;
        //     }
        // });

        $('#saveBtn').on('click', function(event) {
            $.ajax('{{route('backend.settings.comments.save')}}', {
                method: 'POST',
                dataType:'json',
                data: {
                    enable: $('#enable').is(":checked"),
                    type: $("#type").val(),
                    must_be_registered: $('#must_be_registered').is(":checked"),
                    allow_nested: $('#allow_nested').is(":checked"),
                    nested_level: $('#nested_level').val(),
                    order: $('#order').val(),
                    must_approve: $('#must_approve').is(":checked"),
                    allow_approved: $('#allow_approved').is(":checked"),
                    email_admin_on_new_comments: $('#email_admin_on_new_comments').is(":checked"),
                    email_admin_on_moderation: $('#email_admin_on_moderation').is(":checked"),
                    hide_comments_from_menu: $('#hide_comments_from_menu').is(":checked"),
                    disqus_channel: $('#disqus_channel').val(),

                    _token: Laravel.csrfToken
                },
                success: function(result) {
                    console.log('saved')
                },
                error: function(result) {

                }
            });
        });

    </script>
@endpush
