@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Book Borrow Calendar</a></span></li>
@endsection
@section("title")
    <title>Book Borrow Calendar</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div class="p-5">
            <h2 class="mb-4">Book Borrow Calendar</h2>
            <div class="card" style="width: 1300px">
                <div class="card-body p-0">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        <!-- calendar modal -->
        <div id="modal-view-event" class="modal modal-top fade calendar-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="modal-title"><span class="event-icon"></span><span class="event-title"></span></h4>
                        <div class="event-body"></div>
                        <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                            <div class="ant-row ant-form-item-row css-12jzuas">
                                <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas" style="text-align: start "><label
                                        for="control-ref-borrower" class="ant-form-item-required"
                                        title="Borrower">Borrower</label></div>
                                <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                    <div class="ant-form-item-control-input">
                                        <div class="ant-form-item-control-input-content">
                                            <label id="control-ref-borrower"
                                                   for="control-ref-borrower" class="ant-form-item-required" type="text"
                                                   fdprocessedid="u5g27o" style="position: relative; display: inline-flex;
                                            align-items: center; max-width: 100%;height: 32px;
                                            color: rgba(0, 0, 0, 0.88); font-size: 14px;"
                                                   title="Borrower"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-row ant-form-item-row css-12jzuas">
                                <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas" style="text-align: start "><label
                                        for="control-ref-from-club" class="ant-form-item-required"
                                        title="From Club">From Club</label></div>
                                <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                    <div class="ant-form-item-control-input">
                                        <div class="ant-form-item-control-input-content">
                                            <label id="control-ref-from-club"
                                                   for="control-ref-from-club" class="ant-form-item-required" type="text"
                                                   fdprocessedid="u5g27o" style="position: relative; display: inline-flex;
                                            align-items: center; max-width: 100%;height: 32px;
                                            color: rgba(0, 0, 0, 0.88); font-size: 14px;"
                                                   title="From Club"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-row ant-form-item-row css-12jzuas">
                                <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas" style="text-align: start "><label
                                        for="control-ref-due-date" class="ant-form-item-required"
                                        title="Due Date">Due Date</label></div>
                                <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                    <div class="ant-form-item-control-input">
                                        <div class="ant-form-item-control-input-content">
                                            <label id="control-ref-due-date"
                                                   for="control-ref-due-date" class="ant-form-item-required" type="text"
                                                   fdprocessedid="u5g27o" style="position: relative; display: inline-flex;
                                            align-items: center; max-width: 100%;height: 32px;
                                            color: rgba(0, 0, 0, 0.88); font-size: 14px;"
                                                   title="Due Date"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                                <div class="ant-row ant-form-item-row css-12jzuas">
                                    <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas" style="text-align: start "><label
                                            for="control-ref-return-date" class="ant-form-item-required"
                                            title="Return Date">Return Date</label></div>
                                    <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                        <div class="ant-form-item-control-input">
                                            <div class="ant-form-item-control-input-content">
                                                <label id="control-ref-return-date"
                                                       for="control-ref-return-date" class="ant-form-item-required" type="text"
                                                       fdprocessedid="u5g27o" style="position: relative; display: inline-flex;
                                            align-items: center; max-width: 100%;height: 32px;
                                            color: rgba(0, 0, 0, 0.88); font-size: 14px;"
                                                       title="Return Date"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            jQuery(document).ready(function(){
                jQuery('.datetimepicker').datepicker({
                    timepicker: true,
                    language: 'en',
                    range: true,
                    multipleDates: true,
                    multipleDatesSeparator: " - "
                });
            });

            (function () {
                'use strict';
                jQuery(function() {

                    {{--@endforeach--}}
                    jQuery('#calendar').fullCalendar({
                        themeSystem: 'bootstrap4',
                        // emphasizes business hours
                        businessHours: false,
                        defaultView: 'month',
                        // event dragging & resizing
                        editable: true,
                        // header
                        header: {
                            left: 'title',
                            center: 'month,agendaWeek,agendaDay',
                            right: 'today prev,next'
                        },
                        events: {{ Illuminate\Support\Js::from($bookList) }},
                        eventRender: function(event, element) {
                        },
                        eventClick: function(event, jsEvent, view) {
                            jQuery('.event-icon').html("<i class='fa fa-"+event.icon+"'></i>");
                            jQuery('.event-title').html(event.title);
                            // jQuery('.event-body').html(event.from_club);
                            jQuery('#control-ref-borrower').text(event.borrower);
                            jQuery('#control-ref-from-club').text(event.from_club);

                            jQuery('#control-ref-due-date').text( event.due_date);
                            jQuery('#control-ref-return-date').text( event.return_date);
                            // jQuery('.eventUrl').attr('href',event.url);
                            jQuery('#modal-view-event').modal();
                        },
                    })
                });

            })(jQuery);
        </script>
    </main>
@endsection
@section("js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js"></script>
@endsection
@section("css")
    <link rel="stylesheet" href="{{ asset('css/fullCalendar.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{ asset('css/fullCalendar.css') }}">--}}
@endsection
