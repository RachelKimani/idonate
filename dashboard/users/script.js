$(document).ready(function() {
  $("#example").DataTable({
    aaSorting: [],
    "ajax": '../functions/users.php',
    responsive: true,
    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0
      },
      {
        responsivePriority: 2,
        targets: -1
      }
    ]
  });

  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "auto",
      display: "inline-block"
    });

  $('[data-toggle="tooltip"]').tooltip();
});
