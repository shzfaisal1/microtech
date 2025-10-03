
@extends('master')

@section('main')


<div class="search-client-info">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="filter_company">Company Name:</label>
                        <select id="filter_company" class="form-control">
                            <option value="">All</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="filter_financial_year">Financial Year:</label>
                        <select id="filter_financial_year" class="form-control">
                            <option value="">All</option>
                            @foreach ($financialYears as $fy)
                                <option value="{{ $fy->id }}">{{ $fy->financial_year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                    @if(session('invoice_delete'))
                    <div class="alert alert-danger">{{ session('invoice_delete') }}</div>
                    @endif

                    <h5 class="mb-3">Quotation</h5>
                    <div class="table-responsive">
                        <table id="amc_quotation" class="table table-bordered table-striped w-100">
                            <thead class="table-light">
                                <tr>
                                   <th>Sr.No</th>
                                        <th>Quotation No</th>
                                        <th>Quotation Date</th>  
                                        <th>
                                        Client Group    
                                        </th>  
                                        <th>Type</th>                                     
                                        <th>Subject</th>
                                        <th>Quarter</th>
                                        <th>Tax</th>
                                        <th>price</th>
                                        <th>Financial Year</th>
                                        <th>Company</th>
                                         <th>Action</th>
                                        </tr>

   
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Detail Modal -->
<!-- Updated Modal -->
<div class="modal fade" id="quotationViewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Quotation Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
      </div>
      <div class="modal-body" id="quotation-detail-body"></div>
    </div>
  </div>
</div>




@endsection

@push('scripts')
<script>
$(document).ready(function () {
  
 let table = $('#amc_quotation').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    scrollX: true,
    ajax: {
        url: "{{ route('amc.quatation.index') }}",
        data: function(d) {
            d.company_id = $('#filter_company').val();
            d.financial_year = $('#filter_financial_year').val();
        }
    }, order: [[0, 'desc']],
    
  columns: [

   
    { data: 'id', name: 'id', orderable: false, searchable: false },
    { data: 'quotation_no', name: 'quotation_no' },
     { data: 'quotation_date', name: 'quotation_date' },
     { data: 'clientgroup', name: 'clientgroup' },
    { data: 'quotation_type', name: 'quotation_type' },
    { data: 'subject', name: 'subject' },
    { data: 'quarter', name: 'quarter' },
    { data: 'tax_id', name: 'tax_id' },
    { data: 'price', name: 'price' },
    { data: 'financial_year', name: 'financial_year' },
    { data: 'company', name: 'company' },

  

    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
]

});

// Re-draw table on filter change
$('#filter_company, #filter_financial_year').change(function() {
    table.draw();
});
$(document).on('click', '.view-amc', function (e) {
    e.preventDefault();
    const id = $(this).data('id');

    $.ajax({
        url: "{{ url('/masters/amc-quotation/show/modal') }}/" + id,
        type: 'GET',
        success: function (res) {
            console.log(res);
            if (res.length > 0) {
                const data = res[0];
                console.log(data)
                let html = `
                    <div class="row mb-3">
                        <div class="col-md-6"><strong>Company Name :</strong> ${data.company_name?.company_name || '-'}</div>
                        <div class="col-md-6"><strong>Financial Year :</strong> ${data.finance_name?.financial_year || '-'}</div>
                        <div class="col-md-6"><strong>Employee Name :</strong> ${data.employee?.name || '-'}</div>
                        <div class="col-md-6"><strong>Client Group :</strong> ${data.client_group?.name || '-'}</div>
                        <div class="col-md-6"><strong>Client Name :</strong> ${data.clients_name?.client_name || '-'}</div>
                        <div class="col-md-6"><strong>Contact Person :</strong> ${data.contact_person?.name || '-'}</div>
                        <div class="col-md-12"><strong>Address :</strong> ${data.clients_name?.address || '-'}</div>
                        <div class="col-md-6"><strong>Quot. No/Date :</strong> ${data.quotation_no || '-'} / ${data.quotation_date || '-'}</div>
                        <div class="col-md-6"><strong>Subject :</strong> ${data.subject || '-'}</div>
                        <div class="col-md-6"><strong>Quarter :</strong> ${data.quarter?.name || '-'}</div>
                        <div class="col-md-6"><strong>Note :</strong> ${data.note || '-'}</div>
                    </div>

            



<!-- Modal Footer -->
<div class="modal-footer py-2">
    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
    <a href="{{ url('/masters/quatation/edit') }}/${data.id}" class="btn btn-primary btn-sm">Edit</a>
</div>
`;

                $('#quotation-detail-body').html(html);
                $('#quotationViewModal').modal('show');
            }
        },
        error: function () {
            alert("Failed to load quotation details.");
        }
    });
});


   
});

</script>
@endpush
