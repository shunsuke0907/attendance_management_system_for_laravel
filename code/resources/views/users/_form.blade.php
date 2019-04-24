@csrf

<label for="user_name">名前</label>
<input type="text" name="user[name]" @yield('value_name') id="user_name" class="form-control" required/>

<label for="user_email">メールアドレス</label>
<input type="email" name="user[email]" @yield('value_email') id="user_email" class="form-control" required/>

<label for="user_department">所属</label>
<input type="text" name="user[department]" @yield('value_department') id="user_department" class="form-control" required/>

<label for="user_password">パスワード</label>
<input type="password" name="user[password]" id="user_password" class="form-control" @yield('required')/>

<label for="user_password_confirmation">パスワード（確認）</label>
<input type="password" name="user[password_confirmation]" id="user_password_confirmation" class="form-control" @yield('required')/>

<input type="submit" name="commit" value=@yield('button_text') data-disable-with=@yield('button_text') class="btn btn-primary"/>
