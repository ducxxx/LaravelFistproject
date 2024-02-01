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
                            @foreach($clubs as $index => $club)
                                <tr>
                                    <td>{{ $club->name }}</td>
                                    <td>{{ $club->address }}</td>
                                    <td>{{ $club->description }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
            searching: true, // Enable searching
             "dom": '<"top"f>rt<"bottom"p>',
            });
        });
    </script>
@endsection
