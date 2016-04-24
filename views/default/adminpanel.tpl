<div class="container">
    <div class="row">

        <!--//  //-->
        <?php if($this->index == 'index'){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Панель администратора
            </div>
            <div class="panel-body">
                <a href="/admin/get/">Посмотреть список всех пользователей</a>
                <p>Найти пользователя</p>
                <p>Удалить пользователя</p>
            </div>
        </div>
        <?php } ?>
        <!--//  //-->

        <!--//  //-->
        <?php if($this->index == 'get'){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Панель администратора
            </div>
            <div class="panel-body">
                <div class="col-lg-4">
                    <table class="table col-lg-4">
                        <caption>Список пользователей</caption>
                        <tr>
                            <th>Имя</th>
                            <th>Почта</th>
                        </tr>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php print_r($this->list); ?>
            </div>
        </div>
        <?php } ?>
        <!--//  //-->


    </div>
</div>