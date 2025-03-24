				<!--app header-->
				<div class="hor-header header top-header">
					<div class="container">
						<div class="d-flex">
							<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
							<a class="header-brand" href="<?php echo e(url('')); ?>">
								<img src="<?php echo e(asset('assets/images/brand/foodcitylogo.png')); ?>" class="header-brand-img desktop-lgo" alt="Azea logo">
								<img src="<?php echo e(asset('assets/images/brand/logo1.png')); ?>" class="header-brand-img dark-logo" alt="Azea logo">
								<img src="<?php echo e(asset('assets/images/brand/favicon.png')); ?>" class="header-brand-img mobile-logo" alt="Azea logo">
								<img src="<?php echo e(asset('assets/images/brand/favicon1.png')); ?>" class="header-brand-img darkmobile-logo" alt="Azea logo">
							</a>
							
							<div class="d-flex order-lg-2 ms-auto main-header-end">
								<button  class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="true" aria-label="Toggle navigation">
									<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
								</button>
								<div class="navbar navbar-expand-lg navbar-collapse responsive-navbar p-0">
									<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
										<div class="d-flex order-lg-2">											
											<div class="dropdown header-message d-flex">
												<a class="nav-link icon" data-bs-toggle="dropdown">
													<svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"/></svg>
													<span class="badge bg-success side-badge">5</span>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow  animated">
													<div class="dropdown-header">
														<h6 class="mb-0">Messages</h6>
														<span class="badge fs-10 bg-secondary br-7 ms-auto">New</span>
													</div>
													<div class="header-dropdown-list message-menu">
														<a class="dropdown-item border-bottom" href="<?php echo e(url('chat')); ?>">
															<div class="d-flex align-items-center">
																<div class="">
																	<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo e(asset('assets/images/users/1.jpg')); ?>"></span>
																</div>
																<div class="d-flex mt-1 mb-1">
																	<div class="ps-3">
																		<span class="mb-1 fs-13">Joan Powell</span>
																		<p class="fs-12 mb-1">All the best your template awesome</p>
																		<div class="fs-11 text-muted">
																			3 hours ago
																		</div>
																	</div>
																</div>
															</div>
														</a>
														<a class="dropdown-item border-bottom" href="<?php echo e(url('chat')); ?>">
															<div class="d-flex align-items-center">
																<div class="">
																	<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo e(asset('assets/images/users/2.jpg')); ?>"></span>
																</div>
																<div class="d-flex mt-1 mb-1">
																	<div class="ps-3">
																		<span class="mb-1 s-13">Gavin Sibson</span>
																		<p class="fs-12 mb-1">Hey! there I'm available</p>
																		<div class="fs-11 text-muted">
																			5 hour ago
																		</div>
																	</div>
																</div>
															</div>
														</a>
														<a class="dropdown-item border-bottom" href="<?php echo e(url('chat')); ?>">
															<div class="d-flex align-items-center">
																<div class="">
																	<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo e(asset('assets/images/users/3.jpg')); ?>"></span>
																</div>
																<div class="d-flex mt-1 mb-1">
																	<div class="ps-3">
																		<span class="mb-1">Julian Kerr</span>
																		<p class="fs-12 mb-1">Just created a new blog post</p>
																		<div class="fs-11 text-muted">
																			45 mintues ago
																		</div>
																	</div>
																</div>
															</div>
														</a>
														<a class="dropdown-item border-bottom" href="<?php echo e(url('chat')); ?>">
															<div class="d-flex align-items-center">
																<div class="">
																	<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo e(asset('assets/images/users/4.jpg')); ?>"></span>
																</div>
																<div class="d-flex mt-1 mb-1">
																	<div class="ps-3">
																		<span class=" fs-13 mb-1">Cedric Kelly</span>
																		<p class="fs-12 mb-1">Added new comment on your photo</p>
																		<div class="fs-11 text-muted">
																			2 days ago
																		</div>
																	</div>
																</div>
															</div>
														</a>
														<a class="dropdown-item border-bottom"  href="<?php echo e(url('chat')); ?>">
															<div class="d-flex align-items-center">
																<div class="">
																	<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo e(asset('assets/images/users/6.jpg')); ?>"></span>
																</div>
																<div class="d-flex mt-1 mb-1">
																	<div class="ps-3">
																		<span class="mb-1 fs-13">Julian Kerr</span>
																		<p class="fs-12 mb-1">Your payment invoice is generated</p>
																		<div class="fs-11 text-muted">
																			3 days ago
																		</div>
																	</div>
																</div>
															</div>
														</a>
														<a class="dropdown-item" href="<?php echo e(url('chat')); ?>">
															<div class="d-flex align-items-center">
																<div class="">
																	<span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo e(asset('assets/images/users/7.jpg')); ?>"></span>
																</div>
																<div class="d-flex mt-1 mb-1">
																	<div class="ps-3">
																		<span class="mb-1 fs-13">Faith Dickens</span>
																		<p class="fs-12 mb-1">Please check your mail....</p>
																		<div class="fs-11 text-muted">
																			4 days ago
																		</div>
																	</div>
																</div>
															</div>
														</a>
													</div>
													<div class=" text-center p-2 pt-3 border-top">
														<a href="<?php echo e(url('chat')); ?>" class="fs-13 btn btn-primary btn-md btn-block">See More</a>
													</div>
												</div>
											</div>
											<div class="dropdown header-notify d-flex">
												<a class="nav-link icon" data-bs-toggle="dropdown">
													<svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"/></svg><span class="pulse "></span>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow  animated">
													<div class="dropdown-header">
														<h6 class="mb-0">Notifications</h6>
														<span class="badge fs-10 bg-secondary br-7 ms-auto">New</span>
													</div>
													<div class="notify-menu">
														<a href="<?php echo e(url('email-inbox')); ?>" class="dropdown-item border-bottom d-flex ps-4">
															<div class="notifyimg  text-primary bg-primary-transparent border-primary"> <i class="fa fa-envelope"></i> </div>
															<div>
																<span class="fs-13">Message Sent.</span>
																<div class="small text-muted">3 hours ago</div>
															</div>
														</a>
														<a href="<?php echo e(url('email-inbox')); ?>" class="dropdown-item border-bottom d-flex ps-4">
															<div class="notifyimg  text-secondary bg-secondary-transparent border-secondary"> <i class="fa fa-shopping-cart"></i></div>
															<div>
																<span class="fs-13">Order Placed</span>
																<div class="small text-muted">5  hour ago</div>
															</div>
														</a>
														<a href="<?php echo e(url('email-inbox')); ?>" class="dropdown-item border-bottom d-flex ps-4">
															<div class="notifyimg  text-danger bg-danger-transparent border-danger"> <i class="fa fa-gift"></i> </div>
															<div>
																<span class="fs-13">Event Started</span>
																<div class="small text-muted">45 mintues ago</div>
															</div>
														</a>
														<a href="<?php echo e(url('email-inbox')); ?>" class="dropdown-item border-bottom d-flex ps-4 mb-2">
															<div class="notifyimg  text-success  bg-success-transparent border-success"> <i class="fa fa-windows"></i> </div>
															<div>
																<span class="fs-13">Your Admin lanuched</span>
																<div class="small text-muted">1 daya ago</div>
															</div>
														</a>
													</div>
													<div class=" text-center p-2">
														<a href="<?php echo e(url('email-inbox')); ?>" class="btn btn-primary btn-md fs-13 btn-block">View All</a>
													</div>
												</div>
											</div>

											<div class="dropdown profile-dropdown d-flex">
												<a href="javascript:void(0);" class="nav-link pe-0 leading-none" data-bs-toggle="dropdown">
													<span class="header-avatar1">
														<img src="<?php echo e(asset('assets/images/users/2.jpg')); ?>" alt="img" class="avatar avatar-md brround">
													</span>
												</a>
												<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
													<div class="text-center">
														<div class="text-center user pb-0 font-weight-bold" id="setting_user_name">Patrenna</div>
														<span class="text-center user-semi-title" id="settingUserRole">Web Designer</span>
														<div class="dropdown-divider"></div>
													</div>
													<a class="dropdown-item d-flex" href="<?php echo e(url('profile1')); ?>">
														<svg class="header-icon me-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
														<div class="fs-13">Profile</div>
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
								<div class="d-flex"> <a class="nav-link icon demo-icon" href="<?php echo e(route('adminSettings')); ?>"> <svg xmlns="http://www.w3.org/2000/svg" class="header-icon fa-spin" width="24" height="24" viewBox="0 0 24 24"> <path d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"> </path> <path d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"> </path> </svg> </a> </div>
							</div>
						</div>
					</div>
				</div>
				<!--/app header--><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/layouts/horizontal/app-header.blade.php ENDPATH**/ ?>