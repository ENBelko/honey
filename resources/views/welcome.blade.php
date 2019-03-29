@extends('layouts.app')

@section('content')
    <section class="py-5 honey-style">
        <div class="container">
            <div class="w-100">
                <img src="{{asset('img/honey/mail_icon.png')}}" class="mx-auto d-block mail-icon" alt="">
            </div>
            <form name="send" method="post">
                @csrf
                <div class="d-flex">
                    <div class="w-45 mr-auto">
                        <div class="form-group">
                            <label for="name">Имя <span class="star">*</span></label>
                            <input type="text" name="name" class="form-control form-honey">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="star">*</span></label>
                            <input type="email" name="email" class="form-control form-honey">
                        </div>
                    </div>
                    <div class="w-45">
                        <div class="form-group">
                            <label for="comment">Комментарий <span class="star">*</span></label>
                            <textarea name="comment" id="txt-area" cols="30" rows="10"
                                      class="form-control form-honey"></textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-honey float-right" value="Записать">
            </form>
        </div>
    </section>

    <section class="py-5 honey-style-versa">

        <div class="container">
            <div id="comment-block" class="d-flex flex-wrap">
            @foreach($comments as $comment)
                <div class="mx-auto card @if($comment->id % 2 != 0) card-honey-1 @else card-honey-2 @endif">
                    <div class="card-header text-center">{{$comment->name}}</div>
                    <div class="card-body text-center">
                        <span><b>{{$comment->email}}</b></span><br>
                        <span>{{$comment->comment}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
@section('scripts')
    <script>
        $(document).on('submit', 'form[name="send"]', (event) => {
            //alert('я тут!');
            event.preventDefault();
            let data = new FormData(event.currentTarget);

            $.ajax({
                method: 'POST',
                url: '{{route('comment.store')}}',
                data: data,
                contentType: false,
                processData: false,
                success: (result) => {

                    $('#comment-block').append('' +
                        '<div class="mx-auto card card-honey-'+result.mod+'">\n' +
                        '<div class="card-header text-center">'+result.name+'</div>\n' +
                        '<div class="card-body text-center">\n' +
                        '<span><b>'+result.email+'</b></span><br>\n' +
                        '<span>'+result.comment+'</span>\n' +
                        '</div>\n' +
                        '</div>');

                    showMsg(result.success);
                },
                error: (jqXHR, exception) => {
                    let verrors = '';
                    $.each(jqXHR.responseJSON.errors, function (key, value) {
                        verrors += value;
                    });
                    showMsg(verrors, 'error');
                }
            })

        })

    </script>
@endsection