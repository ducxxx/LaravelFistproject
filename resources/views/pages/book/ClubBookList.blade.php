@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Club Book List</a></span></li>
@endsection
@section("title")
    <title>Club Book List</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div class="sc-gxYJeL iVyfZn">
            <div class="card shadow mb-4" style="width: 1340px">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">CLUB BOOKS LIST</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="ant-btn css-12jzuas ant-btn-primary" onclick="window.location.href='{{ route('book.add.form') }}'"
                    style="width: 120px;"><span>Add New Book</span>
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Book Name</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Club Name</th>
                                <th>Init Count</th>
                                <th>Current Count</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="ant-table-cell">{{ $book->name }}</td>
                                    <td class="ant-table-cell">{{ $book->author_name }}</td>
                                    <td class="ant-table-cell">{{ $book->category_name }}</td>
                                    <td class="ant-table-cell">{{ $book->club_name }}</td>
                                    <td class="ant-table-cell">{{ $book->init_count }}</td>
                                    <td class="ant-table-cell">{{ $book->current_count }}</td>
                                    <td class="ant-table-cell">
                                        <div class="ant-space css-12jzuas ant-space-horizontal ant-space-align-center"
                                             style="gap: 8px;">
                                            <div class="ant-space-item">
                                                <button type="button" value="{{$book->club_book_id}}"
                                                        class="edit-button ant-btn css-12jzuas ant-btn-primary"
                                                        fdprocessedid="q8qe9e"><span
                                                        class="ant-btn-icon"><span role="img"
                                                                                   aria-label="edit"
                                                                                   class="anticon anticon-edit"><svg
                                                                viewBox="64 64 896 896" focusable="false"
                                                                data-icon="edit" width="1em" height="1em"
                                                                fill="currentColor" aria-hidden="true"><path
                                                                    d="M257.7 752c2 0 4-.2 6-.5L431.9 722c2-.4 3.9-1.3 5.3-2.8l423.9-423.9a9.96 9.96 0 000-14.1L694.9 114.9c-1.9-1.9-4.4-2.9-7.1-2.9s-5.2 1-7.1 2.9L256.8 538.8c-1.5 1.5-2.4 3.3-2.8 5.3l-29.5 168.2a33.5 33.5 0 009.4 29.8c6.6 6.4 14.9 9.9 23.8 9.9zm67.4-174.4L687.8 215l73.3 73.3-362.7 362.6-88.9 15.7 15.6-89zM880 836H144c-17.7 0-32 14.3-32 32v36c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-36c0-17.7-14.3-32-32-32z"></path></svg></span></span><span>Edit</span>
                                                </button>
                                                <script>
                                                    $(document).ready(function () {
                                                        $('.edit-button').on('click', function () {
                                                            // Get the member ID from the button's value attribute
                                                            var clubBookId = $(this).val();

                                                            // Redirect to the member.detail route with the member ID
                                                            window.location.href = '/club/book/detail/'+clubBookId;
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </td>
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
