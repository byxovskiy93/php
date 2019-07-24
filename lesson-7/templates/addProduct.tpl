<form class="needs-validation" enctype="multipart/form-data" method="POST" novalidate="" style="padding: 50px">

    {{MESSAGES}}

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="firstName">Имя</label>
            <input type="text" name="name" class="form-control" id="firstName" placeholder="" value="" required>
        </div>
        <div class="col-md-6 mb-3">
            <label for="lastName">Цена</label>
            <input type="number" name="price" class="form-control" id="lastName" placeholder="" value="" required>
        </div>

        <div class="col-md-12 mb-3">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" rows="2" name="description" placeholder="" required></textarea>
        </div>
        <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
        <div class="col-md-12 mb-3">
            <div class="custom-file">
                <input type="file" name="images" class="custom-file-input" id="customFile" required>
                <label class="custom-file-label" for="customFile">Выбрать файл</label>
            </div>
        </div>

    </div>

    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Добавить</button>
    <a href="index.php" class="btn btn-info btn-lg btn-block">Вернутся назад</a>


</form>