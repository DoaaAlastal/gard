
        <div class="col-xl-3 col-lg-4">
            <div class="m-portlet m-portlet--full-height  ">
                <div class="m-portlet__body">
                    <div class="m-card-profile">
                        <div class="m-card-profile__title m--hide">
                            My Profile
                        </div>
                        <div class="m-card-profile__pic">
                            <div class="m-card-profile__pic-wrapper">
                                <img  src="{{asset(Auth::guard('admin')->user()->image)}}" alt="" width="80" height="80">
                            </div>
                        </div>
                        <div class="m-card-profile__details">
												<span class="m-card-profile__name">
													{{Auth::guard('admin')->user()->en_name}}
												</span>
                            <a href="" class="m-card-profile__email m-link">
                                {{Auth::guard('admin')->user()->email}}
                            </a>
                        </div>
                    </div>
                    <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                        <li class="m-nav__separator m-nav__separator--fit"></li>
                        <li class="m-nav__section m--hide">
												<span class="m-nav__section-text">
													Section
												</span>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{url('admin/profile')}}" class="m-nav__link " >
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
                                <span class="m-nav__link-text">
														Messages
								</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{url('admin/profile/my-courses')}}" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-time-3"></i>
                                <span class="m-nav__link-text">
														My Courses
								</span>
                            </a>
                        </li>
                        <li class="m-nav__item">
                            <a href="{{url('admin/profile/my-articles')}}" class="m-nav__link">
                                <i class="m-nav__link-icon flaticon-share"></i>
                                <span class="m-nav__link-text">
														My Articles
								</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
