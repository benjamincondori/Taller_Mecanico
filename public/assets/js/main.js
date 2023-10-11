$(document).ready(function() {
    if (window.jQuery) {
        if ($.fn.DataTable) {
            $('.dts').DataTable({
                language: {
                    url: '/assets/libs/datatables/spanish.json'
                }
            });
        }
    }
});
