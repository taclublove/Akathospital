    {{-- MDB Start --}}
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    {{-- MDB End --}}

    {{-- Test Script Start --}}
        <script>
            function toggleCollapse(Id) {
                var element = document.getElementById(Id);
                var changeTransform = element.style.transform;

                if(changeTransform === 'rotate(0deg)') {
                    element.style.transform = 'rotate(180deg)';
                    element.style.transition = '0.3s ease';
                } else {
                    element.style.transform = 'rotate(0deg)';
                    element.style.transition = '0.3s ease';
                }
            }
        </script>
    {{-- Test Script End --}}

    {{-- Script CRUD Start --}}
        <script src='https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable({
            });
        });
    </script> --}}

    <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {
                const url = 'http://localhost:3000/api/users';
                $('#users').DataTable({
                        ajax: {
                            url: url,
                            dataSrc: ''
                        },
                        columns: [{
                                data: "user_id"
                            },
                            {
                                data: "username"
                            },
                            {
                                data: "first_name"
                            },
                            {
                                data: "last_name"
                            },
                            {
                                data: "gender"
                            },
                            {
                                data: "password"
                            },
                            {
                                data: "status"
                            },
                        ],
                        responsive: true
                    }).columns.adjust()
                    .responsive.recalc();
            })
        </script>
    {{-- Script CRUD End --}}

    {{-- <script src="{{ asset('src/styles/bs5/summernote-bs5.js') }}"></script> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> --}}

