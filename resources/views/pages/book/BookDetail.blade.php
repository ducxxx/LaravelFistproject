@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Book Detail</a></span></li>
@endsection
@section("title")
    <title>Book Detail</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div style="display: flex; align-items: center; justify-content: center;">
            <div style="display: flex; padding: 30px; background: rgb(255, 255, 255); border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.12) 0px 5px 5px;">
                <form id="control-ref" class="ant-form ant-form-horizontal css-12jzuas" enctype="multipart/form-data" method="POST" action="{{ route('club.book.update', ['id' => $book->id]) }}"
                      style="width: 600px;">
                    @csrf
                    @method('PUT')
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_book_name" class="ant-form-item-required"
                                    title="Book Name">Book Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_book_name" aria-required="true" name="bookName" disabled=""
                                            class="ant-input ant-input-status-success css-12jzuas"
                                            type="text" value="{{ $book->book_name }}" fdprocessedid="u5g27o"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_address" class="ant-form-item-required"
                                    title="Club Name">Club Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_address" aria-required="true" disabled=""
                                            class="ant-input ant-input-status-success css-12jzuas" name="clubName"
                                            type="text" value="{{ $book->club_name }}" fdprocessedid="btzix5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Author Name">Author Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_phone_number" aria-required="true" disabled=""
                                            class="ant-input ant-input-status-success css-12jzuas" name="authorName"
                                            type="text" value="{{ $book->author_name }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Category Name">Category Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref-birth-date" aria-required="true" disabled=""
                                            class="ant-input ant-input-status-success css-12jzuas" name="categoryName"
                                            type="text" value="{{ $book->category_name }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Init Count">Init Count</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_phone_number" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="initCount"
                                            type="text" value="{{ $book->init_count }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_phone_number" class="ant-form-item-required"
                                    title="Current Count">Current Count</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content"><input
                                            id="control-ref_phone_number" aria-required="true"
                                            class="ant-input ant-input-status-success css-12jzuas" name="currentCount"
                                            type="text" value="{{ $book->current_count }}" fdprocessedid="ia3rrq"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-16 ant-col-offset-8 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <button type="submit" class="ant-btn css-12jzuas ant-btn-primary"
                                                style="margin-right: 10px;"><span>Submit</span>
                                        </button>
                                        <button type="button" id="cancelButton"
                                                class="ant-btn css-12jzuas ant-btn-default" fdprocessedid="g5id65">
                                            <span>Cancel</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var cancelButton = document.getElementById('cancelButton');
                            cancelButton.addEventListener('click', function () {
                                window.history.back();
                            });
                        });
                    </script>
                </form>
            </div>
        </div>
    </main>
@endsection
