<div class="modal fade in" id="modal_auth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     style="padding: 19px;">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="padding: 20px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
            </div>
            <div class="modal-body">
                <div class="main-login main-center">
                    <!--Задаим форме POST метод и пропишем путь к файлу занимающемуся отправкой данных на сервер-->
                    <form class="form-horizontal" method="POST" action="/todolist/lib/registration.php">
<!--                        <div class="form-group">-->
<!--                            <label for="name" class="cols-sm-2 control-label">Имя</label>-->
<!--                            <div class="cols-sm-10">-->
<!--                                <div class="input-group">-->
<!--                                    <span class="input-group-addon"><i class="fa fa-user fa"-->
<!--                                                                       aria-hidden="true"></i></span>-->
<!--                                    <input required="" type="text" class="form-control" name="name" id="name"-->
<!--                                           placeholder="Введите Ваше имя">-->
<!--                            </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input required="" type="email" class="form-control" name="email" id="email"
                                           placeholder="Введите Ваш Email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="cols-sm-2 control-label">Пароль</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa"
                                                                       aria-hidden="true"></i></span>
                                    <input required="" type="password" class="form-control" name="password"
                                           id="password" placeholder="Ваш пароль">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-lg btn-block login-button"
                                    name="btn-login">
                                <i class="glyphicon glyphicon-log-in"></i>&nbsp;Войти
                            </button>
                        </div>
                    </form>
                    <div class="text-center">
                        <a href="#">Не зарегестрированы?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>