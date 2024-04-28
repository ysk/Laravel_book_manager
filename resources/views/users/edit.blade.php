@extends('common.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header"><i class="fa-solid fa-user"></i>{{ $user->name }}さんのマイページ</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h4>ユーザー情報</h4>
                    <form method="POST">
                        <table class="table">
                            <tr>
                                <th>住所</th>
                                <td><input type="text" name="address" value="{{ old('address', $user->userprof->address) }}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td><input type="text" name="phone" value="{{ old('phone', $user->userprof->phone) }}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>GitHub</th>
                                <td><input type="text" name="github_url" value="{{ old('github_url', $user->userprof->github_url) }}" class="form-control"></td>
                            </tr>
                            <tr>
                                <th>自己紹介</th>
                                <td><textarea name="prof_text" class="form-control">{{ old('prof_text', $user->userprof->prof_text) }}</textarea></td>
                            </tr>
                        </table>
                        <div class="form-buttons text-center">
                            <a href="{{ route('profile.show', ['id' => $user->id]) }}" class="btn btn-secondary" style="margin-right: 20px">戻る</a>
                            <button type="submit" class="btn btn-primary">更新する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection