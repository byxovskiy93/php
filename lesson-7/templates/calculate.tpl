<form name="calculate" method="post" style="padding: 30px">
    <label for="argument_one">Число 1:</label><br>
    <input type="number" name="argument_one" id="argument_one" required><br>
    <label for="argument_two">Число 2:</label><br>
    <input type="number" name="argument_two"  id="argument_two" required><br><br>
    <label for="argument_two">Операция:</label>
    <select name="operation" required>
        <option value=""></option>
        <option value="addition">+</option>
        <option value="subtraction">-</option>
        <option value="multiplication">*</option>
        <option value="division">/</option>
    </select><br><br>
    <input type="submit" value="Расчитать">
</form>

<form name="calculate" method="post" style="padding: 0 30px">
    <label for="argument_one">Число 1:</label><br>
    <input type="number" name="argument_one" id="argument_one" required><br>
    <label for="argument_two">Число 2:</label><br>
    <input type="number" name="argument_two"  id="argument_two" required><br><br>
    <input type="submit" name="operation" value="+">
    <input type="submit" name="operation" value="-">
    <input type="submit" name="operation" value="*">
    <input type="submit" name="operation" value="/">
</form>

<div class="result" style="padding:0 30px">
    <p>Результат: {{RESULT}}</p>
</div>
