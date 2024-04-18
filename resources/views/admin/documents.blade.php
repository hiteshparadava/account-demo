@extends('admin/layouts/layoutMaster')

@section('vendor-style')
<!-- vendor style files -->
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
<link rel="stylesheet" href="../../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
@endsection

@section('page-style')
<!-- page style files -->
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> Documents </h4>
	
	<!-- Users List Table -->
	<div class="card">
		<div class="card-datatable table-responsive">
			<table class="datatables-users table border-top">
				<thead>
					<tr>
						<th>Id</th>
						<th>Title</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($documents as $document)
						<tr>
							<td>{{ $document->id }}</td>
							<td>{{ $document->title }}</td>
							<td>
								<div class="d-flex align-items-center">
									<a href="{{ route('admin.document.edit',$document->id) }}" class="text-body"><i class="ti ti-edit ti-sm me-2"></i></a>
									<a href="javascript:void(0);" onclick="conform(event,'{{$document->id}}');" class="text-body confirm-text"><i class="ti ti-trash ti-sm mx-2"></i></a>
									<form id="destroy-form-{{$document->id}}" method="POST" action="{{ route('admin.document.destroy',$document->id) }}" style="display: none;">
										@method('DELETE')
										@csrf
									</form>
									<a href="{{ asset('storage/'.$document->file) }}" class="text-body" download><i class="ti ti-download ti-sm mx-2"></i></a>
								</div>
							</td>
						</tr>
						
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('vendor-script')
<!-- vendor files -->
<script src="../../assets/vendor/libs/moment/moment.js"></script>
<script src="../../assets/vendor/libs/datatables/jquery.dataTables.js"></script>
<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../../assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
<script src="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
<script src="../../assets/vendor/libs/jszip/jszip.js"></script>
<script src="../../assets/vendor/libs/pdfmake/pdfmake.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
<script src="../../assets/vendor/libs/datatables-buttons/buttons.print.js"></script>
<script src="../../assets/vendor/libs/select2/select2.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
@endsection

@section('page-script')
<!-- Page js files -->
<!-- <script src="../../assets/js/app-user-list.js"></script> -->
<script type="application/javascript">
$(function() {
  var dt_basic_table = $('.datatables-users');

  if (dt_basic_table.length) {
    dt_basic = dt_basic_table.DataTable({
      columns: [
        { data: 'id' },
        { data: 'title' },
        { data: '' }
      ],
	  columnDefs: [
		{
          // Actions
          targets: -1,
          title: 'Actions',
          searchable: false,
          orderable: false,
        }
      ],
      order: [[0, 'desc']],
	  dom: '<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      displayLength: 10,
      lengthMenu: [10, 25, 50, 75, 100],
	  language: {
        sLengthMenu: '_MENU_',
        search: '',
        searchPlaceholder: 'Search..'
      },
      buttons: [
      ],
    });
	$('div.head-label').html('<a href="{{ route("admin.document.create") }}" class="btn btn-primary"><i class="ti ti-plus me-sm-1"></i>Add New Documents</a>');
  }
});


function conform(ev,id)
{
	ev.preventDefault();
	
	var urlToRedirect = ev.currentTarget.getAttribute('href');
	console.log(urlToRedirect);
	Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
          confirmButton: 'btn btn-primary me-3',
          cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
      }).then(function (result) {
        if (result.value) {
			$('#destroy-form-'+id).submit();
			//window.location.href = urlToRedirect;
        }
    });
}

</script>
@endsection