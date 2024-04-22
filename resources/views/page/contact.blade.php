@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">マイページ</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="contact">お問い合わせ内容</label>
                            <textarea class="form-control" name="contact" id="contact" rows="5" placeholder="お問い合わせ内容を入力してください"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">お問い合わせ送信</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
