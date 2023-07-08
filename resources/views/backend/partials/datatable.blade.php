@push('css_link')
    <link rel="stylesheet" href="{{ asset('plugin/datatable/datatables.min.css') }}">

@endpush

@push('js_link')
    <script src="{{ asset('plugin/datatable/datatables.min.js') }}"></script>
@endpush


@push('js')
  <script>
    $(document).ready(function() {
      $('.datatable').each(function() {
        var columnsToShow =  {!! json_encode($columns_to_show ?? []) !!};
        $(this).DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'pdfHtml5',
                    title: 'Blood Group Management',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'A4',
                    exportOptions: {
                        columns: columnsToShow,
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: columnsToShow,
                    }
                },  'excel', 'csv', 'pageLength',
            ]
        });
      });
    });
  </script>
@endpush
