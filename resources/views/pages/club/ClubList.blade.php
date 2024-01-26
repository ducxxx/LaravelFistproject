@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Club List</a></span></li>
@endsection
@section("title")
    <title>Club List</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div class="sc-gxYJeL iVyfZn">
            <div class="card shadow mb-4" style="width: 1320px">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">CLUBS LIST</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th style="width: 190px">Name</th>
                                <th style="width: 150px">Address</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($clubs as $index => $club)
                                <tr>
                                    <td>{{ $club->name }}</td>
                                    <td>{{ $club->address }}</td>
                                    <td>{{ $club->description }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No clubs found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
            searching: true, // Enable searching
             "dom": '<"top"f>rt<"bottom"p>',
        });
            // $('div.dataTables_filter input').css('text-align', 'left');
        });
    </script>

    <!-- Page level custom scripts -->
@endsection
