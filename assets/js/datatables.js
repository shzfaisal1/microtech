$(function(e) {
	$('#example').DataTable();
	
	$('#datatable1').DataTable({
	 responsive: true,
	 language: {
	   searchPlaceholder: 'Search...',
	   sSearch: '',
	   lengthMenu: '_MENU_ items/page',
	 }
   });

   $('#datatable2').DataTable({
	 bLengthChange: false,
	 searching: false,
	 responsive: true
   });

   // Select2
   $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
   
});

$(function(e) {
	$('#examples').DataTable();
	
	$('#datatable1').DataTable({
	 responsive: true,
	 language: {
	   searchPlaceholder: 'Search...',
	   sSearch: '',
	   lengthMenu: '_MENU_ items/page',
	 }
   });

   $('#datatable2').DataTable({
	 bLengthChange: false,
	 searching: false,
	 responsive: true
   });

   // Select2
   $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
   
} );