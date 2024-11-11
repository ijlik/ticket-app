@extends('layouts.dashboard')

@section('content')
    <div class=" content-body default-height">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head mb-4 d-flex flex-wrap align-items-center">
                <div class="me-auto">
                    <h2 class="font-w600 mb-0">{{$title}}</h2>
                    <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm">Create new Events</a>
                </div>
                <div class="input-group search-area2 d-xl-inline-flex mb-2 me-lg-4 me-md-2">
                    <button class="input-group-text"><i class="flaticon-381-search-2 text-primary"></i></button>
                    <input type="text" class="form-control" placeholder="Search here...">
                </div>
                <div class="dropdown custom-dropdown mb-2 period-btn">
                    <div class="btn btn-sm  d-flex align-items-center" data-bs-toggle="dropdown" aria-expanded="false"
                         role="button">
                        <svg class="primary-icon" width="28" height="28" viewBox="0 0 28 28" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.167 5.83362H21.0003V3.50028C21.0003 3.19087 20.8774 2.89412 20.6586 2.67533C20.4398 2.45653 20.143 2.33362 19.8336 2.33362C19.5242 2.33362 19.2275 2.45653 19.0087 2.67533C18.7899 2.89412 18.667 3.19087 18.667 3.50028V5.83362H9.33362V3.50028C9.33362 3.19087 9.2107 2.89412 8.99191 2.67533C8.77312 2.45653 8.47637 2.33362 8.16695 2.33362C7.85753 2.33362 7.56079 2.45653 7.34199 2.67533C7.1232 2.89412 7.00028 3.19087 7.00028 3.50028V5.83362H5.83362C4.90536 5.83362 4.01512 6.20237 3.35874 6.85874C2.70237 7.51512 2.33362 8.40536 2.33362 9.33362V10.5003H25.667V9.33362C25.667 8.40536 25.2982 7.51512 24.6418 6.85874C23.9854 6.20237 23.0952 5.83362 22.167 5.83362Z"
                                fill="#0E8A74"/>
                            <path
                                d="M2.33362 22.1669C2.33362 23.0952 2.70237 23.9854 3.35874 24.6418C4.01512 25.2982 4.90536 25.6669 5.83362 25.6669H22.167C23.0952 25.6669 23.9854 25.2982 24.6418 24.6418C25.2982 23.9854 25.667 23.0952 25.667 22.1669V12.8336H2.33362V22.1669Z"
                                fill="#0E8A74"/>
                        </svg>
                        <div class="text-start ms-3 flex-1">
                            <span class="d-block text-black">Change Periode</span>
                            <small class="d-block text-muted">August 28th - October 28th, 2021</small>
                        </div>
                        <i class="fa fa-caret-down text-light scale5 ms-3"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="javascript:void(0);">October 29th - November 29th, 2021</a>
                        <a class="dropdown-item" href="javascript:void(0);">July 27th - Auguts 27th, 2021</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="row">
                    </div>
                </div>
                <div class="col-xl-9 col-xxl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card event-bx">
                                <div class="card-header border-0 mb-0">
                                    <h4 class="fs-20 card-title">Recent Event List</h4>
                                    <div class="dropdown custom-dropdown mb-0 tbl-orders-style">
                                        <div class="btn sharp tp-btn" data-bs-toggle="dropdown">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                    stroke="#194039" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path
                                                    d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                    stroke="#194039" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                                <path
                                                    d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                    stroke="#194039" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="javascript:void(0);">Details</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body dz-scroll loadmore-content pt-0" id="EventListContent">
                                    <div class="media event-list pb-3 border-bottom mb-3">
                                        <div class="image">
                                            <img src="/images/card/Untitled-15.jpg" alt="">
                                            <i class="las la-film image-icon"></i>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                                              class="text-black">Konser Dewa 19 Di Gor
                                                    Pasuruan</a></h4>
                                            <span
                                                class="fs-14 d-block mb-sm-2 mb-2 text-secondary">Pasuruan, Indonesia</span>
                                            <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad mini</p>
                                        </div>
                                        <div class="media-footer">
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-usd" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">$124,00</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">561 pcs Left</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">24 Januari 2025</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media event-list pb-3 border-bottom mb-3">
                                        <div class="image">
                                            <img src="/images/card/Untitled-16.jpg" alt="">
                                            <i class="fa fa-music image-icon"></i>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                                              class="text-black">Google I/O Developer
                                                    Conference</a></h4>
                                            <span
                                                class="fs-14 d-block mb-sm-2 mb-2 text-secondary">Medan, Indonesia</span>
                                            <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad mini</p>
                                        </div>
                                        <div class="media-footer">
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-usd" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">Rp.150.000</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3 disabled">
                                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">561 pcs Left</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">24 June 2020</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media event-list pb-3 border-bottom mb-3">
                                        <div class="image">
                                            <img src="/images/card/Untitled-17.jpg" alt="">
                                            <i class="fa fa-music image-icon"></i>

                                        </div>
                                        <div class="media-body">
                                            <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                                              class="text-black">Apple Worldwide
                                                    Developers Conference (WWDC)</a></h4>
                                            <span
                                                class="fs-14 d-block mb-sm-2 mb-2 text-secondary">Medan, Indonesia</span>
                                            <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad mini</p>
                                        </div>
                                        <div class="media-footer">
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-usd" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">$124,00</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3 disabled">
                                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">561 pcs Left</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 disabled mb-3">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">24 June 2020</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media event-list pb-3 border-bottom mb-3">
                                        <div class="image">
                                            <img src="/images/card/Untitled-15.jpg" alt="">
                                            <i class="fa fa-music image-icon"></i>

                                        </div>
                                        <div class="media-body">
                                            <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                                              class="text-black"> TED Global Summit
                                                    2020</a></h4>
                                            <span
                                                class="fs-14 d-block mb-sm-2 mb-2 text-secondary">Medan, Indonesia</span>
                                            <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad mini</p>
                                        </div>
                                        <div class="media-footer">
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-usd" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">$124,00</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3 disabled">
                                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">561 pcs Left</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 disabled mb-3">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">24 June 2020</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media event-list pb-3 border-bottom mb-3">
                                        <div class="image">
                                            <img src="/images/card/Untitled-16.jpg" alt="">
                                            <i class="fa fa-music image-icon"></i>

                                        </div>
                                        <div class="media-body">
                                            <h4 class="fs-18 mb-sm-0 mb-2"><a href="javascript:void(0);"
                                                                              class="text-black"> Adobe MAX Creative
                                                    Conference</a></h4>
                                            <span
                                                class="fs-14 d-block mb-sm-2 mb-2 text-secondary">Medan, Indonesia</span>
                                            <p class="fs-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                                                enim ad mini</p>
                                        </div>
                                        <div class="media-footer">
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3">
                                                <i class="fa fa-usd text-primary" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">$124,00</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 mb-3 disabled">
                                                <i class="fa fa-ticket" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">561 pcs Left</div>
                                            </div>
                                            <div class="text-center">
                                            <span class="ticket-icon-1 disabled mb-3">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>
                                                <div class="fs-12 text-primary">24 June 2020</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center pt-0 border-0">
                                    <a href="javascript:void(0);"
                                       class="btn btn-secondary btn-lg  text-white dz-load-more" id="EventList"
                                       rel="ajax/event-list.html">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body text-center event-calender pb-2 px-2 pt-2">
                                    <input type='text' class="form-control d-none" id='datetimepicker1'>
                                </div>
                                <div class="card-header py-0 border-0">
                                    <h4 class="text-black fs-20">Upcoming Events</h4>
                                </div>
                                <div class="card-body pb-0 loadmore-content height450 dz-scroll"
                                     id="UpcomingEventContent">
                                    <div class="media mb-5 align-items-center event-list">
                                        <div class="p-3 text-center me-3 date-bx bgl-primary">
                                            <h2 class="mb-0 text-secondary fs-28 font-w600">3</h2>
                                            <h5 class="mb-1 text-black">Wed</h5>
                                        </div>
                                        <div class="media-body px-0">
                                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live
                                                    Concert Choir Charity Event 2020</a></h6>
                                            <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                                <li>Ticket Sold</li>
                                                <li>561/650</li>
                                            </ul>
                                            <div class="progress mb-0" style="height:4px; width:100%;">
                                                <div class="progress-bar bg-warning progress-animated"
                                                     style="width:60%;" role="progressbar">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media mb-5 align-items-center event-list">
                                        <div class="p-3 text-center me-3 date-bx bgl-primary">
                                            <h2 class="mb-0 text-secondary fs-28 font-w600">16</h2>
                                            <h5 class="mb-1 text-black">Wed</h5>
                                        </div>
                                        <div class="media-body px-0">
                                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live
                                                    Concert Choir Charity Event 2020</a></h6>
                                            <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                                <li>Ticket Sold</li>
                                                <li>431/650</li>
                                            </ul>
                                            <div class="progress mb-0" style="height:4px; width:100%;">
                                                <div class="progress-bar bg-warning progress-animated"
                                                     style="width:50%;" role="progressbar">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media mb-5 align-items-center event-list">
                                        <div class="p-3 text-center me-3 date-bx bgl-primary">
                                            <h2 class="mb-0 text-primary fs-28 font-w600">28</h2>
                                            <h5 class="mb-1 text-black">Wed</h5>
                                        </div>
                                        <div class="media-body px-0">
                                            <h6 class="mt-0 mb-3 fs-14"><a class="text-black" href="event.html">Live
                                                    Concert Choir Charity Event 2020</a></h6>
                                            <ul class="fs-14 list-inline mb-2 d-flex justify-content-between">
                                                <li>Ticket Sold</li>
                                                <li>650/650</li>
                                            </ul>
                                            <div class="progress mb-0" style="height:4px; width:100%;">
                                                <div class="progress-bar bg-warning progress-animated"
                                                     style="width:100%;" role="progressbar">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer pt-0 border-0">
                                    <a href="javascript:void(0);"
                                       class="btn btn-secondary btn-block text-white dz-load-more" id="UpcomingEvent"
                                       rel="ajax/upcoming-event.html">Load More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
