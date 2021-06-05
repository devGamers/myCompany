<!-- BEGIN: Vendor JS-->
<script src="{{ asset('js/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/forms/toggle/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/scripts/forms/switch.min.js') }}" type="text/javascript"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script type="text/javascript" src="{{ asset('js/ui/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/forms/jqBootstrapValidation.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/extensions/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/extensions/sweetalert2.all.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/datatable/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/buttons.flash.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/jszip.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/pdfmake.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/vfs_fonts.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/buttons.html5.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/tables/buttons.print.min.js') }}" type="text/javascript"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('js/core/app-menu.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/core/app.min.js') }}" type="text/javascript"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('js/scripts/forms/form-login-register.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/scripts/cards/card-advanced.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/forms/select/form-select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/scripts/tooltip/tooltip.min.js') }}" type="text/javascript"></script>
{{-- <script src="{{ asset('js/tables/datatable/datatable-advanced.min.js') }}" type="text/javascript"></script> --}}
{{-- <script src="{{ asset('js/scripts/extensions/toastr.min.js') }}" type="text/javascript"></script> --}}
<!-- END: Page JS-->

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.key').keypress(function (evt) {
        return (evt.which !== 8 && evt.which !== 46 && ((evt.which < 48) || (evt.which > 57))) ? false : true
    });

    @if(session()->has('success'))
        swal({
            title: "{{ config('app.name') }}",
            text: "{{ session()->get('success') }}",
            type: 'success',
            padding: '2em'
        })
    @endif

    @if(session()->has('error'))
        swal({
            title: "{{ config('app.name') }}",
            text: "{{ session()->get('error') }}",
            type: 'error',
            padding: '2em'
        })
    @endif

    @if(session()->has('warning'))
        swal({
            title: "{{ config('app.name') }}",
            text: "{{ session()->get('warning') }}",
            type: 'warning',
            padding: '2em'
        });
    @endif

    const simpleAlert = (title, text, type) => {
        swal(title, text, type)
    }

    const showModal = (id, name) => {
        $('#' + name + id).modal('show')
    }

    const delForm = (id, form) => {
        swal({
            title: "{{ config('app.name') }}",
            text: 'Voulez-vous vraiment supprimer ?',
            type: 'error',
            showCancelButton: true,
            confirmButtonText: 'Supprimer',
            padding: '2em'
        }).then(function(result) {
            if (result.value) {
                $('#'+ form + id).submit()
            }
        })
    }

    const notify = (type, text) => {
        switch (type) {
            case 'success':
                toastr.success(
                    text,
                    "{{ config('app.name') }}",
                    {
                        showMethod:"slideDown",
                        hideMethod:"slideUp",
                        timeOut:2e3
                    }
                )
                break;
            case 'warning':
                toastr.warning(
                    text,
                    "{{ config('app.name') }}",
                    {
                        showMethod:"slideDown",
                        hideMethod:"slideUp",
                        timeOut:2e3
                    }
                )
                break;

            default:
                toastr.error(
                    text,
                    "{{ config('app.name') }}",
                    {
                        showMethod:"slideDown",
                        hideMethod:"slideUp",
                        timeOut:2e3
                    }
                )
                break;
        }
    }

    const listeMois = () => {
        return new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    }

    $(document).ready(function () {
        $(".tableau").DataTable({
            dom: "Bfrtip",
            buttons: ["copy", "csv", "excel", "pdf", "print"],
            "language": {
                "lengthMenu": "Afficher _MENU_ par page",
                "zeroRecords": "Aucune données trouvées",
                "info": "Affichage _START_ sur _END_ à _TOTAL_ au total",
                "infoEmpty": "Aucune données dans le tableau",
                "infoFiltered": "(Filtrer sur _MAX_ données total)",
                "search": "Rechercher : ",
                "oPaginate": {
                    "sNext": ">",
                    "sPrevious": "<"
                }
            },
        }),
        $(
            ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
        ).addClass("btn btn-primary mr-1");

        $(".smallTableau").DataTable({
            displayLength: 5,
            dom: "Bfrtip",
            buttons: ["copy", "csv", "excel", "pdf", "print"],
            "language": {
                "lengthMenu": "Afficher _MENU_ par page",
                "zeroRecords": "Aucune données trouvées",
                "info": "Affichage _START_ sur _END_ à _TOTAL_ au total",
                "infoEmpty": "Aucune données dans le tableau",
                "infoFiltered": "(Filtrer sur _MAX_ données total)",
                "search": "Rechercher : ",
                "oPaginate": {
                    "sNext": ">",
                    "sPrevious": "<"
                }
            },
        }),
        $(
            ".buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel"
        ).addClass("btn btn-primary mr-1");

        $(".simpleTableau").DataTable({
            displayLength: 5,
            "language": {
                "lengthMenu": "Afficher _MENU_ par page",
                "zeroRecords": "Aucune données trouvées",
                "info": "Affichage _START_ sur _END_ à _TOTAL_ au total",
                "infoEmpty": "Aucune données dans le tableau",
                "infoFiltered": "(Filtrer sur _MAX_ données total)",
                "search": "Rechercher : ",
                "oPaginate": {
                    "sNext": ">",
                    "sPrevious": "<"
                }
            },
            "lengthChange": false,
            dom: 'Pfrtip'
        })
    });
</script>

@hasSection('js')
    @yield('js')
@endif
