@extends("layouts.app")
@section("breadcrumb")
    <li><span class="ant-breadcrumb-link"><a>Book Vote</a></span></li>
@endsection
@section("title")
    <title>Book Vote</title>
@endsection
@section("body")
    <main class="ant-layout-content css-12jzuas" style="padding: 24px; overflow: auto;">
        <div style="display: flex; align-items: center; justify-content: center;">
            <div style="display: flex; padding: 30px; background: rgb(255, 255, 255);
            border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.12) 0px 5px 5px;">
                @if ($bookDetail->book_image)
                    <img id="img-book" class="profilepic__image" src="{{ $bookDetail->book_image }}" width="150"
                         height="150" alt="Book Image" />
                @else
                    <img id="img-book" class="profilepic__image" src="{{ asset('book-image/th.jpg') }}"
                         width="150" height="150" alt="Default Image" />
                @endif
                <form id="control-ref" class="ant-form ant-form-horizontal css-12jzuas" enctype="multipart/form-data"
                      method="POST" action="{{ route('book.vote.create') }}"
                      style="width: 600px;">
                    @csrf
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-book-name" class="ant-form-item-required"
                                    title="BookName">Book Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <label
                                            for="control-ref-book-name" class="ant-form-item-required" type="text"
                                            fdprocessedid="u5g27o" style="position: relative; display: inline-flex;
                                            align-items: center; max-width: 100%;height: 32px;
                                            color: rgba(0, 0, 0, 0.88); font-size: 14px;"
                                            title="Book Name">{{ $bookDetail->book_name }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_full_name" class="ant-form-item-required"
                                    title="Author Name">Author Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <label
                                            for="control-ref-author-name" class="ant-form-item-required" type="text"
                                            fdprocessedid="u5g27o" style="position: relative; display: inline-flex;
                                            align-items: center; max-width: 100%;height: 32px;
                                            color: rgba(0, 0, 0, 0.88); font-size: 14px;"
                                            title="Author Name">{{ $bookDetail->author_name}}</label>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ant-form-item css-12jzuas ant-form-item-has-success">
                        <div class="ant-row ant-form-item-row css-12jzuas">
                            <div class="ant-col ant-col-8 ant-form-item-label css-12jzuas"><label
                                    for="control-ref_address" class="ant-form-item-required"
                                    title="Category Name">Category Name</label></div>
                            <div class="ant-col ant-col-16 ant-form-item-control css-12jzuas">
                                <div class="ant-form-item-control-input">
                                    <div class="ant-form-item-control-input-content">
                                        <label
                                            for="control-ref-category-name" class="ant-form-item-required" type="text"
                                            fdprocessedid="u5g27o" style="position: relative; display: inline-flex;
                                            align-items: center; max-width: 100%;height: 32px;
                                            color: rgba(0, 0, 0, 0.88); font-size: 14px;"
                                            title="Category Name">{{ $bookDetail->category_name}}</label>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input
                        id="control-ref-book-id" aria-required="true" name="book_id" type="hidden"
                        value="{{$bookDetail->book_id}}"
                        class="ant-input ant-input-status-success css-12jzuas"
                        fdprocessedid="u5g27o">
                    <br>
                    <div class="card">

                        <div class="row">

                            <div class="col-2">
                                @if (Auth::user()->avatar)
                                    <img src="{{asset(Auth::user()->avatar)}}" width="70" class="rounded-circle mt-2">
                                @else
                                    <img src="{{asset('avatars/default-avatar.jpg')}}" width="70" class="rounded-circle mt-2">
                                @endif
                            </div>
                            <div class="col-10">
                                <div class="comment-box ml-2">
                                    <h4>Add a comment</h4>
                                    <div class="rating">
                                        @if ($checkComment ==0)
                                            <input type="radio" name="rating" value="5" id="5" disabled = "">
                                            <label for="5">☆</label>
                                            <input type="radio" name="rating" value="4" id="4" disabled = "">
                                            <label for="4">☆</label>
                                            <input type="radio" name="rating" value="3" id="3" disabled = "">
                                            <label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2" disabled = "">
                                            <label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1" disabled = "">
                                            <label for="1">☆</label>
                                        @else
                                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                        @endif
                                    </div>

                                    <div class="comment-area">
                                        @if ($checkComment ==0)
                                            <textarea class="form-control" placeholder="what is your view?"
                                                      rows="4" disabled = ""></textarea>
                                        @else
                                            <textarea class="form-control" placeholder="what is your view?"
                                                      rows="4"></textarea>
                                            <input
                                                id="control-ref-book-comment" aria-required="true" name="book_comment"
                                                type="hidden"
                                                class="ant-input ant-input-status-success css-12jzuas"
                                                fdprocessedid="u5g27o">
                                        @endif
                                    </div>

                                    <div class="comment-btns mt-2">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="pull-left">
                                                    <button class="btn btn-success btn-sm">Cancel</button>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="pull-right">
                                                    <button class="btn btn-success send btn-sm" id="sendBtn">Send
                                                        <i class="fa fa-long-arrow-right ml-1"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function () {
                                            // Event listener for the Send button
                                            $('#sendBtn').on('click', function () {
                                                // Get the comment text from the textarea
                                                // Your AJAX request
                                                $('#control-ref-book-comment').val($('.form-control').val());
                                                $.ajax({
                                                    type: 'POST',
                                                    url: '/book/vote/create',
                                                    data: {
                                                    },
                                                    success: function (data) {
                                                        // Handle success response from the server
                                                        console.log(data);
                                                    },
                                                    error: function (error) {
                                                        // Handle error response from the server
                                                        console.log(error);
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="content-item" id="comments">
                        <div class="container">
                            <h4>Book comment history</h4>
                            @foreach($book as $bookDetail)
                                @if($bookDetail->book_comment)
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <!-- COMMENT 1 - START -->
                                            <div class="media">
                                                @if ($bookDetail->user_avatar)
                                                    <a class="pull-left" href="#"><img class="media-object" src="{{asset($bookDetail->user_avatar)}}" alt=""></a>
                                                @else
                                                    <a class="pull-left" href="#"><img class="media-object" src="{{asset('avatars/default-avatar.jpg')}}" alt=""></a>
                                                @endif
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$bookDetail->username}}</h4>
                                                    <p>{{$bookDetail->book_comment}}</p>
                                                </div>
                                            </div>
                                            <!-- COMMENT 1 - END -->
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
@endsection
