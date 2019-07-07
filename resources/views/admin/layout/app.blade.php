<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        GARD
    </title>
    <meta name="description" content="Blank inner page examples">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
@yield('css')
<!--begin::Base Styles -->
    <link href="/demo/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/demo/assets/demo/demo12/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/demo/assets/demo/default/custom/components/base/bootstrap-toastr/toastr.css" rel="stylesheet" type="text/css"/>
    <link href="/css/custom.css" rel="stylesheet" type="text/css" />

    <!--end::Base Styles -->
    <!--begin::Page Vendors -->
    <!--end::Page Vendors -->

    <link rel="shortcut icon" href="/demo/assets/demo/demo12/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
    <header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="{{url('admin/')}}" class="m-brand__logo-wrapper">
                                <img alt="" src="/demo/assets/demo/demo12/media/img/logo/logo.png"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Topbar Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>
                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>
                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <!-- BEGIN: Horizontal Menu -->
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                        <i class="la la-close"></i>
                    </button>
                    <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-dark m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
                        <ul class="m-menu__nav ">
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-add"></i>
                                    <span class="m-menu__link-text">
												Actions
											</span>
                                    <i class="m-menu__hor-arrow la la-angle-down"></i>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="{{url('admin/posts/articles/create')}}" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-file"></i>
                                                <span class="m-menu__link-text">
															Create New Article
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="{{url('admin/course/create')}}" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-file"></i>
                                                <span class="m-menu__link-text">
															Create New Course
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="{{url('admin/event/create')}}" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-file"></i>
                                                <span class="m-menu__link-text">
															Create New Event
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item  m-menu__item--submenu"  m-menu-submenu-toggle="hover" m-menu-link-redirect="1" aria-haspopup="true">
                                            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                                <i class="m-menu__link-icon flaticon-users"></i>
                                                <span class="m-menu__link-text">
															Manage Users
														</span>
                                                <i class="m-menu__hor-arrow la la-angle-right"></i>
                                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                                            </a>
                                            <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--right">
                                                <span class="m-menu__arrow "></span>
                                                <ul class="m-menu__subnav">
                                                    <li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
                                                        <a  href="{{url('admin/admin')}}" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Admin
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
                                                        <a  href="{{url('admin/instructor')}}" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Instructor
																	</span>
                                                        </a>
                                                    </li>
                                                    <li class="m-menu__item "  m-menu-link-redirect="1" aria-haspopup="true">
                                                        <a  href="{{url('admin/user')}}" class="m-menu__link ">
																	<span class="m-menu__link-text">
																		Student
																	</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-line-graph"></i>
                                    <span class="m-menu__link-text">
												Reports
											</span>
                                    <i class="m-menu__hor-arrow la la-angle-down"></i>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left">
                                    <ul class="m-menu__subnav" style="display:none;">
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-map"></i>
                                                <span class="m-menu__link-text">
																		Annual Reports
																	</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-user"></i>
                                                <span class="m-menu__link-text">
																		HR Reports
																	</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-clipboard"></i>
                                                <span class="m-menu__link-text">
																		IPO Reports
																	</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-graphic-1"></i>
                                                <span class="m-menu__link-text">
																		Finance Margins
																	</span>
                                            </a>
                                        </li>
                                        <li class="m-menu__item "  aria-haspopup="true">
                                            <a  href="actions.html" class="m-menu__link ">
                                                <i class="m-menu__link-icon flaticon-graphic-2"></i>
                                                <span class="m-menu__link-text">
																		Revenue Reports
																	</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                    <!-- END: Horizontal Menu -->
                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">

                                <li class="m-nav__item m-topbar__notifications m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center 	m-dropdown--mobile-full-width" m-dropdown-toggle="click" m-dropdown-persistent="1">
                                    <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
												<span class="m-nav__link-icon">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-music-2"></i>
													</span>
													<span class="m-nav__link-badge m-badge m-badge--danger">
														3
													</span>
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center">
														<span class="m-dropdown__header-title">
															9 New
														</span>
                                                <span class="m-dropdown__header-subtitle">
															User Notifications
														</span>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                                Alerts
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_events" role="tab">
                                                                Events
                                                            </a>
                                                        </li>
                                                        <li class="nav-item m-tabs__item">
                                                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#topbar_notifications_logs" role="tab">
                                                                Logs
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                            <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                                <div class="m-list-timeline m-list-timeline--skin-light">
                                                                    <div class="m-list-timeline__items">
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                            <span class="m-list-timeline__text">
																						12 new users registered
																					</span>
                                                                            <span class="m-list-timeline__time">
																						Just now
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						System shutdown
																						<span class="m-badge m-badge--success m-badge--wide">
																							pending
																						</span>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						14 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						New invoice received
																					</span>
                                                                            <span class="m-list-timeline__time">
																						20 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						DB overloaded 80%
																						<span class="m-badge m-badge--info m-badge--wide">
																							settled
																						</span>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						1 hr
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						System error -
																						<a href="#" class="m-link">
																							Check
																						</a>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						2 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span href="" class="m-list-timeline__text">
																						New order received
																						<span class="m-badge m-badge--danger m-badge--wide">
																							urgent
																						</span>
																					</span>
                                                                            <span class="m-list-timeline__time">
																						7 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item m-list-timeline__item--read">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						Production server down
																					</span>
                                                                            <span class="m-list-timeline__time">
																						3 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
																						Production server up
																					</span>
                                                                            <span class="m-list-timeline__time">
																						5 hrs
																					</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                            <div class="m-scrollable" data-scrollable="true" data-max-height="250" data-mobile-max-height="200">
                                                                <div class="m-list-timeline m-list-timeline--skin-light">
                                                                    <div class="m-list-timeline__items">
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                New order received
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						Just now
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-danger"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                New invoice received
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						20 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-success"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                Production server up
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						5 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                New order received
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						7 hrs
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                System shutdown
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						11 mins
																					</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge m-list-timeline__badge--state1-info"></span>
                                                                            <a href="" class="m-list-timeline__text">
                                                                                Production server down
                                                                            </a>
                                                                            <span class="m-list-timeline__time">
																						3 hrs
																					</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                            <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                                                <div class="m-stack__item m-stack__item--center m-stack__item--middle">
																			<span class="">
																				All caught up!
																				<br>
																				No new logs.
																			</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li style="display: none" class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-email"></i>
													</span>
													<span class="m-nav__link-badge m-badge m-badge--accent">
														3
													</span>
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper" >
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center">
														<span class="m-dropdown__header-title">
															New Messages
														</span>
                                            </div>
                                            <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                <div class="m-dropdown__content">
                                                    <div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
                                                        <div class="m-nav-grid m-nav-grid--skin-light">
                                                            <div class="m-nav-grid__row">
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-file"></i>
                                                                    <span class="m-nav-grid__text">
																				Generate Report
																			</span>
                                                                </a>
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-time"></i>
                                                                    <span class="m-nav-grid__text">
																				Add New Event
																			</span>
                                                                </a>
                                                            </div>
                                                            <div class="m-nav-grid__row">
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                    <span class="m-nav-grid__text">
																				Create New Task
																			</span>
                                                                </a>
                                                                <a href="#" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                    <span class="m-nav-grid__text">
																				Completed Tasks
																			</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="m-nav__item m-topbar__quick-actions m-dropdown m-dropdown--skin-light m-dropdown--large m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-nav__link-icon">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-share"></i>
													</span>
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center">
														<span class="m-dropdown__header-title">
															Quick Actions
														</span>

                                            </div>
                                            <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                <div class="m-dropdown__content">
                                                    <div class="m-scrollable" data-scrollable="false" data-max-height="380" data-mobile-max-height="200">
                                                        <div class="m-nav-grid m-nav-grid--skin-light">
                                                            <div class="m-nav-grid__row">
                                                                <a href="{{url('admin/profile/my-articles')}}" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-file"></i>
                                                                    <span class="m-nav-grid__text">
																				My Articles
																			</span>
                                                                </a>
                                                                <a href="{{url('admin/profile/my-courses')}}" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-folder"></i>
                                                                    <span class="m-nav-grid__text">
																				My Courses
																			</span>
                                                                </a>
                                                            </div>
                                                            <div class="m-nav-grid__row">
                                                                <a href="{{url('admin/profile')}}" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-profile"></i>
                                                                    <span class="m-nav-grid__text">
																				My Profile
																			</span>
                                                                </a>
                                                                <a href="{{url('admin/')}}" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-settings"></i>
                                                                    <span class="m-nav-grid__text">
																				Dashboard
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{ asset(Auth::guard('admin')->user()->image)}}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
                                        <span class="m-nav__link-icon m-topbar__usericon  m--hide">
													<span class="m-nav__link-icon-wrapper">
														<i class="flaticon-user-ok"></i>
													</span>
												</span>
                                        <span class="m-topbar__username m--hide">
													{{Auth::guard('admin')->user()->en_name}}
                                        </span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center">
                                                <div class="m-card-user m-card-user--skin-light">
                                                    <div class="m-card-user__pic">
                                                        <img src="/{{Auth::guard('admin')->user()->image}}" class="m--img-rounded m--marginless" alt=""/>
                                                    </div>
                                                    <div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	{{Auth::guard('admin')->user()->en_name}}
																</span>
                                                        <a class="m-card-user__email m--font-weight-300 m-link">
                                                            {{Auth::guard('admin')->user()->email}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{url('admin/profile')}}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                <span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					My Profile
																				</span>
																			</span>
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{url('admin/profile/messages')}}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                <span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					Messages
																				</span>
																				<span class="m-nav__link-badge" style="display: none">
																					<span class="m-badge m-badge--success">
																						2
																					</span>
																				</span>
																			</span>
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            <a href="{{url('admin/profile/my-courses')}}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-folder"></i>
                                                                <span class="m-nav__link-text">
																			My Courses
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="{{url('admin/profile/my-articles')}}" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-file"></i>
                                                                <span class="m-nav__link-text">
																			My Articles
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            <a href="{{ url('/admin/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Logout
                                                            </a>
                                                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>
    <!-- END: Header -->
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu"class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"m-menu-scrollable="0" m-menu-dropdown-timeout="500">
                <ul class="m-menu__nav ">
                    <li class="m-menu__item " aria-haspopup="true" >
                        <a  href="{{url('admin/')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-text">
										Dashboard
									</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true" >
                        <a  href="{{url('admin/profile')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-profile"></i>
                            <span class="m-menu__link-text">
										My Profile
                            </span>
                        </a>
                    </li>

                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            Users
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-users"></i>
                            <span class="m-menu__link-text">
										Users
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu " m-hidden-height="160" style="display: none; overflow: hidden;">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a  href="{{url('admin/admin')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-user"></i>
                                        <span class="m-menu__link-text">
										    Admins
									    </span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a  href="{{url('admin/instructor')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-user"></i>
                                        <span class="m-menu__link-text">
                                          Instructors
                                        </span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a  href="{{url('admin/user')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-user"></i>
                                        <span class="m-menu__link-text">
                                            Students
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            Roles & Permissions
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Roles
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu " m-hidden-height="160" style="display: none; overflow: hidden;">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a  href="{{url('admin/roles')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-settings"></i>
                                        <span class="m-menu__link-text">
										    Roles
									    </span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true" hidden>
                                    <a  href="{{url('admin/permissions')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-settings"></i>
                                        <span class="m-menu__link-text">
                                          Permissions
                                        </span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a  href="{{url('admin/admin-role')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-settings"></i>
                                        <span class="m-menu__link-text">
                                          Assign Roles
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            Messages Center
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-folder"></i>
                            <span class="m-menu__link-text">
										Messages
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu " m-hidden-height="160" style="display: none; overflow: hidden;">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('admin/profile/messages')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
													My Messages
										</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('admin/message/new')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
													New Message
										</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('admin/message/email')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
													New Email
										</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            Main Components
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-interface-9"></i>
                            <span class="m-menu__link-text">
										Main Components
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu " m-hidden-height="160" style="display: none; overflow: hidden;">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">

                                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                    <a  href="{{url('admin/course')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-interface-9"></i>
                                        <span class="m-menu__link-text">
										Courses
									</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                    <a  href="{{url('admin/video')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-interface-9"></i>
                                        <span class="m-menu__link-text">
										Videos
									</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                    <a  href="{{url('admin/event')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-interface-9"></i>
                                        <span class="m-menu__link-text">
										Events
									</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                    <a  href="{{url('admin/posts/articles')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-interface-9"></i>
                                        <span class="m-menu__link-text">
										Articles
									</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                    <a  href="{{url('admin/posts/news')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-interface-9"></i>
                                        <span class="m-menu__link-text">
										News
									</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                    <a  href="{{url('admin/section')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-interface-9"></i>
                                        <span class="m-menu__link-text">
										Sections
									</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                                    <a  href="{{url('admin/category')}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span>
                                        <i class="m-menu__link-icon flaticon-interface-9"></i>
                                        <span class="m-menu__link-text">
										Categories
									</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            Requests
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-folder"></i>
                            <span class="m-menu__link-text">
										Requests
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu " m-hidden-height="160" style="display: none; overflow: hidden;">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('admin/requests/courses')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
													Courses
										</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('admin/requests/videos')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
													Videos
										</span>
                                    </a>
                                </li>
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('admin/requests/articles')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
													Articles
										</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            NewsLetter
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                        <a href="javascript:;" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon fa fa-thumbs-up"></i>
                            <span class="m-menu__link-text">
										NewsLetter
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                        <div class="m-menu__submenu " m-hidden-height="160" style="display: none; overflow: hidden;">
                            <span class="m-menu__arrow"></span>
                            <ul class="m-menu__subnav">
                                <li class="m-menu__item " aria-haspopup="true">
                                    <a href="{{url('admin/newsletter-subscribers')}}" class="m-menu__link ">
                                        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                            <span></span>
                                        </i>
                                        <span class="m-menu__link-text">
													Subscribers
										</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            Support Center
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true" >
                        <a  href="{{url('admin/support')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-support"></i>
                            <span class="m-menu__link-text">
										Support Tickets
                            </span>
                        </a>
                    </li>


                    <li class="m-menu__section ">
                        <h4 class="m-menu__section-text">
                            System Constant
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{url('admin/tag')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Tags
									</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{url('/admin/countries')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Countries
									</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{url('/admin/currencies')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Currencies
									</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{url('/admin/status')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Status
									</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{url('admin/setting')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Settings
									</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{url('admin/page')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Pages
									</span>
                        </a>
                    </li>
                    <li class="m-menu__item " aria-haspopup="true"  m-menu-link-redirect="1">
                        <a  href="{{url('admin/slider')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-settings"></i>
                            <span class="m-menu__link-text">
										Slider
									</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END: Aside Menu -->
        </div>
        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                @yield('breadcrumb')
            </div>
            <!-- END: Subheader -->

            <div class="m-content">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2019 &copy; GRAD  by
								<a href="https://www.facebook.com/Doaa.Q.Alastal" class="m-link">
									Doaa Alastal
								</a>
							</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- end::Footer -->
</div>
<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!-- begin::Delete Modal -->
<div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Confirm Delete
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												&times;
											</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure you want to delete this item?
                </p>
            </div>
            <div class="modal-footer">
                <form action="" method="" class="deleteForm">
                    @csrf
                    <button type="button" class="btn m-btn--pill    btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button  class="btn m-btn--pill    btn-danger">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- end::Delete Modal -->
<!-- begin::Quick Nav -->
<!--begin::Base Scripts -->
<script src="/demo/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/demo/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<script>
    $(document).on("click", ".deleteBtn", function () {
        $("#Confirm").modal("show");
        $("#Confirm .deleteForm").attr("action", $(this).attr("href"));
        return false;
    })
</script>

@yield('js')
<script src="/demo/assets/demo/default/custom/components/base/toastr.js" type="text/javascript"></script>
<script src="/demo/assets/demo/default/custom/components/base/bootstrap-toastr/toastr.js" type="text/javascript"></script>
<script src="/demo/assets/demo/default/custom/components/base/ui-toastr.min.js" type="text/javascript"></script>
@toastr_render

</body>
<!-- end::Body -->
</html>
