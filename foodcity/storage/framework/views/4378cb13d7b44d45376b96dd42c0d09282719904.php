

<?php $__env->startSection('styles'); ?>
<!-- Data table css -->
<link href="<?php echo e(asset('assets/plugins/datatables/DataTables/css/dataTables.bootstrap5.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/datatables/Buttons/css/buttons.bootstrap5.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/plugins/datatables/Responsive/css/responsive.bootstrap5.min.css')); ?>" rel="stylesheet" />

<!-- Slect2 css -->
<link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title mb-0 text-primary"><?php echo e($title); ?></h4>
	</div>
    <div class="page-rightheader">
        <div class="btn-list">
            <a href="javascript:void(0);" class="btn btn-outline-primary btnBack"><i class="fe fe-skip-back"></i> Back</a>
            <a href="javascript:void(0);"  class="btn btn-primary btn-pill btnEdit"><i class="fe fe-edit-3 me-2 fs-14"></i> Edit</a>
        </div>
    </div>
</div>
<!--End Page header-->

<div class="row">
	<div class="col-lg-6 d-flex">
		<div class="card flex-fill">
			<!-- <div class="card-header">
				<a href="<?php echo e(route('adminUsers.create')); ?>" class="btn btn-md btn-green"><i class="fa fa-user-plus"></i></a>
			</div> -->
			<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <tbody>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Date</span>
                                </td>
                                <td id="date"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Wip No </span>
                                </td>
                                <td id="wipNo"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Customer </span>
                                </td>
                                <td id="customer"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Vehicle Reg No </span>
                                </td>
                                <td id="vehicleRegNo"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Start Date </span>
                                </td>
                                <td id="startDate"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">End Date </span>
                                </td>
                                <td id="endDate"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Cost Amount </span>
                                </td>
                                <td id="costAmount"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Sale Amount </span>
                                </td>
                                <td id="saleAmount"></td>
                            </tr>
                            <tr>
                                <td class="">
                                    <span class="font-weight-semibold w-50">Status </span>
                                </td>
                                <td id="wipStatus"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button class="btn btn-sm btn-success mt-2 float-end" id="btnWipNotes">Notes</button>
                </div>
            </div>
		</div>
	</div> 
    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h3 class="card-title">
                   Attachments
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary me-1" id="btnQrAttachment"><i class="fe fe-plus"></i> Scan QR Code</a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="btnNewAttachment"><i class="fe fe-plus"></i> Add New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
					<div class="table-responsive">
						<table id="attachmentTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Title</th>
                                    <th class="border-bottom-0">File name</th>
                                    <th class="border-bottom-0">File size</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="attachmentContent">
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<div class="row" >
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                   Purchase Order(s)
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="btnNewOrder"><i class="fe fe-plus"></i> Add New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
					<div class="table-responsive">
						<table id="purchaseOrderTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Date</th>
									<th class="border-bottom-0">OrderId</th>
                                    <!-- <th class="border-bottom-0">Suppliers</th> -->
                                    <th class="border-bottom-0">Status</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="purchaseOrderContent">
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                   Receive Note(s)
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="btnFromStock"><i class="fe fe-plus"></i> From Stock</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
					<div class="table-responsive">
						<table id="receiveNoteTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Date</th>
									<th class="border-bottom-0">OrderId</th>
                                    <!-- <th class="border-bottom-0">Suppliers</th> -->
                                    <th class="border-bottom-0">Status</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="receiveNoteContent">
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- stock handover  -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                   WIP Sales
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-success" id="btnHandoverd"><i class="si si-check"></i> Handovered</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
					<div class="table-responsive">
						<table id="stockTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Product</th>
                                    <th class="border-bottom-0">Received</th>
                                    <th class="border-bottom-0">HandOver</th>
                                    <th class="border-bottom-0">HandOvered To</th>
                                    <th class="border-bottom-0">HandOver Date</th>
                                    <th class="border-bottom-0">HandOvered By</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
							</thead>
							<tbody id="stockContent">
								
							</tbody>
                            <tbody id="handoverContent">
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- stock handover  -->
<div class="row">
    <div class="col-lg-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h3 class="card-title">
                   WIP Returns
                </h3>
                <div class="card-options">
                    <!-- <a href="javascript:void(0);" class="btn btn-sm btn-success" id="btnHandoverd"><i class="si si-check"></i> Handovered</a> -->
                </div>
            </div>
            <div class="card-body">
                <div class="">
					<div class="table-responsive">
						<table id="returnTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Product</th>
                                    <th class="border-bottom-0">Received</th>
                                    <th class="border-bottom-0">Rtn Units</th>
                                    <th class="border-bottom-0">Return By</th>
                                    <th class="border-bottom-0">Return Date</th>
                                    <th class="border-bottom-0">Handle By</th>
									<!-- <th class="border-bottom-0">Actions</th> -->
								</tr>
							</thead>
							<tbody id="returnContent">
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
    <div class="col-lg-6  d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h3 class="card-title">
                   WIP Stock Transfer
                </h3>
                <div class="card-options">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" id="btnToStock"><i class="fe fe-plus"></i> To Stock</a>
                </div>
            </div>
            <div class="card-body">
                <div class="">
					<div class="table-responsive">
						<table id="stockTransferTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Product</th>
                                    <th class="border-bottom-0">Units</th>
                                    <th class="border-bottom-0">transfer By</th>
									<!-- <th class="border-bottom-0">Actions</th> -->
								</tr>
							</thead>
							<tbody id="stockTransferContent">
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<div class="modal fade" id="uploadAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">New Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attachmentForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Title<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="attachmentTitle" id="attachmentTitle" placeholder="Attachment Title"  autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Attachment<span class="text-red">*</span></label>
                                    <div class="input-group file-browser mb-5">
                                        <input type="text" class="form-control border-end-0 browse-file" placeholder="choose" readonly>
                                        <label class="input-group-text btn btn-primary">
                                                Browse <input type="file" class="file-browserinput" name="attachmentFile" id="attachmentFile" style="display: none;">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddAttachment"><i class="fe fe-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Edit Attachment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attachmentEditForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Title<span class="text-red">*</span></label>
                                    <input type="text" class="form-control" name="attachmentTitle" id="attachmentTitle" placeholder="Attachment Title"  autocomplete="off">
                                    <input type="hidden" class="form-control" name="wipAttachmentId" id="wipAttachmentId">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnUpdateAttachment"><i class="fe fe-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="QrAttachmentModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Scan to upload attachments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="attachmentEditForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="text-center">
                                    <div id="qrcode"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="btnUpdateAttachment"><i class="fe fe-save"></i> Save</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="purchaseOrderQuickViewModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Quick View Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="btnUpdateAttachment"><i class="fe fe-save"></i> Save</button> -->
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="receiveNoteQuickViewModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Quick View Purchase Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="btnUpdateAttachment"><i class="fe fe-save"></i> Save</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="wipNotesModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Wip Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
					<div class="table-responsive">
						<table id="wipNotesTbl" class="table table-sm table-bordered text-nowrap key-buttons">
							<thead>
								<tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<th class="border-bottom-0">#</th>
									<th class="border-bottom-0">Title</th>
                                    <th class="border-bottom-0">Description</th>
									<th class="border-bottom-0">Actions</th>
								</tr>
                                <tr>
									<!-- <th class="border-bottom-0">User id</th> -->
									<td class="border-bottom-0">#</td>
									<td class="border-bottom-0"><input type="text" class="form-control form-control-sm" name="notesAddTitle" id="notesTitle" placeholder="Notes Title"  autocomplete="off"></td>
                                    <td class="border-bottom-0"><textarea class="form-control form-control-sm" name="notesAddDescription" placeholder="Notes Description" row="2" autocomplete="off"></textarea></td>
									<td class="border-bottom-0"><button type="button" class="btn btn-sm bg-success-transparent btnAddWipNotes" title="Add Note"><i class="fe fe-plus"></i></button></td>
								</tr>
							</thead>
							<tbody id="wipNotesContent">
								
							</tbody>
						</table>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary" id="btnUpdateAttachment"><i class="fe fe-save"></i> Save</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addReturnModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add Returns</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addReturnForm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Return Units<span class="text-red">*</span></label>
                                    <input type="number" class="form-control" name="rtnUnits" id="rtnUnits" placeholder="Return Units"  autocomplete="off">
                                    <input type="hidden" class="form-control" name="wipHandoverId" id="wipHandoverId">
                                    <input type="hidden" class="form-control" name="wipStockId" id="wipStockId">
                                    <input type="hidden" class="form-control" name="wipHandoverUnits" id="wipHandoverUnits">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Return By<span class="text-red">*</span></label>
                                    <select class="form-control form-control-sm custom-select select2" name="returnBy" id="returnBy"></select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Return Date<span class="text-red">*</span></label>
                                    <input type="datetime-local" class="form-control form-control-sm" name="returnDate" id="returnDate" placeholder="Return date" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnAddReturn"><i class="fe fe-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- INTERNAL Select2 js -->
<script src="<?php echo e(asset('assets/plugins/select2/select2.full.min.js')); ?>"></script>
<!-- INTERNAL Data tables -->
<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/DataTables/js/dataTables.bootstrap5.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/JSZip/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/pdfmake/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/pdfmake/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Buttons/js/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/datatables/Responsive/js/responsive.bootstrap5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatables.js')); ?>"></script>
<!-- QR Code  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
<!-- INTERNAL File uploads js -->
<!-- <script src="<?php echo e(asset('assets/plugins/fileupload/js/dropify.js')); ?>"></script> -->
<script src="<?php echo e(asset('assets/js/file-upload.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/wip/view.js?v=1.0.8')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\foodcity\resources\views/admin/wip/view.blade.php ENDPATH**/ ?>