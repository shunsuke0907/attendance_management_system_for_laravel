{{-- FIXME: フォームの遷移先のメソッドが決まり次第修正 --}}

<form class="edit_user" id="edit_user_{{ $user->id }}" action={{ action('UsersController@updateUserInfo', $user) }} accept-charset="UTF-8" method="post">
    @method('PUT')
    @csrf

    <label for="user_name">名前</label>
    <input type="text" name="user[name]" @isset($user->name)value={{ $user->name }}@endisset id="user_name" class="form-control">

    <label for="user_email">メールアドレス</label>
    <input type="email" name="user[email]" @isset($user->email)value={{ $user->email }}@endisset id="user_email" class="form-control">

    <label for="user_department">所属</label>
    <input type="text" name="user[department]" @isset($user->department)value={{ $user->department }}@endisset id="user_department" class="form-control">

    <label for="user_position">役職</label>
    {{-- {{ Form::select('position',  User::POSITION_TYPE_JAPANESE, null, ['class' => 'form-control', 'id' => 'user_position']) }} --}}

    <select name="user[position]" class="form-control">
        @foreach($positionList as $key => $value)
            <option value={{ $key }} @if((int) $user->position === (int) $key) selected @endif>{{ $value }}</option>
        @endforeach
    </select>

    <label for="user_employee_number">社員番号</label>
    <input type="text" name="user[employee_number]" @isset($user->employee_number)value={{ $user->employee_number }}@endisset id="user_employee_number" class="form-control">

    <label for="user_card_number">カード番号</label>
    <input type="text" name="user[card_number]" @isset($user->employee_card_numbernumber)value={{ $user->card_number }}@endisset id="user_card_number" class="form-control">

    <label for="user_basic_time">基本時間</label>
    <input type="time" name="user[basic_time]" @isset($user->basic_time)value={{ getTime($user->basic_time, 'H') }}@endisset id="user_basic_time" class="form-control">

    <label for="user_designated_working_start_time">指定勤務開始時間</label>
    <input type="time" name="user[designated_working_start_time]" @isset($user->designated_working_start_time)value={{ getTime($user->designated_working_start_time, 'H') }}@endisset id="user_designated_working_start_time" class="form-control">

    <label for="user_designated_working_end_time">指定勤務終了時間</label>
    <input type="time" name="user[designated_working_end_time]" @isset($user->designated_working_end_time)value={{ getTime($user->designated_working_end_time, 'H') }}@endisset id="user_designated_working_end_time" class="form-control">

    <label for="user_password">パスワード</label>
    <input type="password" name="user[password]" id="user_password" class="form-control">

    <label for="user_password_confirmation">パスワード（確認）</label>
    <input type="password" name="user[password_confirmation]" id="user_password_confirmation" class="form-control">

    <input type="submit" name="commit" value="更新する" data-disable-with="更新する" class="btn btn-primary">
</form>
