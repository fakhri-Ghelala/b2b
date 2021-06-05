<html>
<head></head>
<body>
<form action="/quotations/create" method="post">
    @csrf
    <input type="text" name="status">
    <input type="text" name="comment">
    <input type="date" name="date_quotation">
    <input type="date" name="valid_until">
    <input type="number" name="tax">
    <input type="submit" value="envoyer">
</form>
</body>
</html>
