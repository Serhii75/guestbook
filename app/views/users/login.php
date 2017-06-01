    <div class="container">

      <form class="form-signin" method="post" action="<?php echo baseUrl().'/users/login'; ?>">
        <h2 class="form-signin-heading text-center">Введите Ваши данные</h2>
        <div class="error"><?php if ( isset($_SESSION['error']) ) echo $_SESSION['error']; ?></div>
        <label for="username" class="sr-only">Email</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Имя пользователя" required autofocus>
        <label for="password" class="sr-only">Пароль</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Пароль" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Запомнить меня
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>

    </div>