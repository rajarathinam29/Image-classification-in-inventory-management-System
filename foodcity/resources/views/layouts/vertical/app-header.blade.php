						<!--app header-->
						<div class="app-header header main-header1">
							<div class="container-fluid">
								<div class="d-flex">
									<a class="header-brand" href="{{route('adminDashboard')}}">
										<img src="{{asset('assets/images/brand/foodcitylogo.png')}}" class="header-brand-img desktop-lgo" alt="Azea logo">
										<img src="{{asset('assets/images/brand/logo1.png')}}" class="header-brand-img dark-logo" alt="Azea logo">
										<img src="{{asset('assets/images/brand/favicon.png')}}" class="header-brand-img mobile-logo" alt="Azea logo">
										<img src="{{asset('assets/images/brand/favicon1.png')}}" class="header-brand-img darkmobile-logo" alt="Azea logo">
									</a>
									<div class="app-sidebar__toggle d-flex" data-bs-toggle="sidebar">
										<a class="open-toggle" href="javascript:void(0);">
											<svg xmlns="http://www.w3.org/2000/svg" class="feather feather-align-left header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/></svg>
										</a>
									</div>
									
									<div class="d-flex order-lg-2 ms-auto main-header-end">
										<button  class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
											<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
										</button>
										<div class="navbar navbar-expand-lg navbar-collapse responsive-navbar p-0">
											<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
												<div class="d-flex order-lg-2">
													<!-- <div class="dropdown  header-fullscreen d-flex" >
														<a  class="nav-link icon full-screen-link p-0"  id="fullscreen-button">
															<svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"/></svg>
														</a>
													</div> -->
													
													<!-- <div class="dropdown header-notify d-flex">
														<a class="nav-link icon" data-bs-toggle="dropdown">
															<svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"/></svg><span class="pulse "></span>
														</a>
														<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow  animated">
															<div class="dropdown-header">
																<h6 class="mb-0">Notifications</h6>
																<span class="badge fs-10 bg-secondary br-7 ms-auto">New</span>
															</div>
															<div class="notify-menu">
																<a href="{{url('email-inbox')}}" class="dropdown-item border-bottom d-flex ps-4">
																	<div class="notifyimg  text-primary bg-primary-transparent border-primary"> <i class="fa fa-envelope"></i> </div>
																	<div>
																		<span class="fs-13">Message Sent.</span>
																		<div class="small text-muted">3 hours ago</div>
																	</div>
																</a>
																<a href="{{url('email-inbox')}}" class="dropdown-item border-bottom d-flex ps-4">
																	<div class="notifyimg  text-secondary bg-secondary-transparent border-secondary"> <i class="fa fa-shopping-cart"></i></div>
																	<div>
																		<span class="fs-13">Order Placed</span>
																		<div class="small text-muted">5  hour ago</div>
																	</div>
																</a>
																<a href="{{url('email-inbox')}}" class="dropdown-item border-bottom d-flex ps-4">
																	<div class="notifyimg  text-danger bg-danger-transparent border-danger"> <i class="fa fa-gift"></i> </div>
																	<div>
																		<span class="fs-13">Event Started</span>
																		<div class="small text-muted">45 mintues ago</div>
																	</div>
																</a>
																<a href="{{url('email-inbox')}}" class="dropdown-item border-bottom d-flex ps-4 mb-2">
																	<div class="notifyimg  text-success  bg-success-transparent border-success"> <i class="fa fa-windows"></i> </div>
																	<div>
																		<span class="fs-13">Your Admin lanuched</span>
																		<div class="small text-muted">1 daya ago</div>
																	</div>
																</a>
															</div>
															<div class=" text-center p-2">
																<a href="{{url('email-inbox')}}" class="btn btn-primary btn-md fs-13 btn-block">View All</a>
															</div>
														</div>
													</div> -->

													<div class="dropdown profile-dropdown d-flex">
														<a href="javascript:void(0);" class="nav-link pe-0 leading-none" data-bs-toggle="dropdown">
															<span class="header-avatar1">
																<img src="{{asset('assets/images/users/2.jpg')}}" alt="img" class="avatar avatar-md brround" id="userProfileImg">
															</span>
														</a>
														<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
															<div class="text-center">
																<div class="text-center user pb-0 font-weight-bold" id="setting_user_name"></div>
																<span class="text-center user-semi-title" id="settingUserRole"></span>
																<div class="text-center user-semi-title" id="settingUserCompanyName"></div>
																<div class="dropdown-divider"></div>
															</div>
															<a class="dropdown-item d-flex btnSwitchCompany" href="javascript:void(0)">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat header-icon me-2" viewBox="0 0 16 16"><path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/></svg>
																<div class="fs-13">Switch Company</div>
															</a>
															<a class="dropdown-item d-flex btnSwitchBranch" href="javascript:void(0)">
																<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat header-icon me-2" viewBox="0 0 16 16"><path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/></svg>
																<div class="fs-13">Switch Branch</div>
															</a>
											
															<a class="dropdown-item d-flex btnLogout" href="javascript:void(0)">
																<svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg>
																<div class="fs-13">Sign Out</div>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="d-flex"> <a class="nav-link icon demo-icon" href="{{route('adminSettings')}}"> <svg xmlns="http://www.w3.org/2000/svg" class="header-icon fa-spin" width="24" height="24" viewBox="0 0 24 24"> <path d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"> </path> <path d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"> </path> </svg> </a> </div>
									</div>
								</div>
							</div>
						</div>
						<!--/app header-->