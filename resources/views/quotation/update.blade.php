<html>
<head></head>
<body>
<form action="/quotations/update/{{$quotation->id}}" method="post">
    @csrf
    <input type="text" name="status" value={{$quotation->status}}>
    <input type="text" name="comment" value={{$quotation->comment}}>
    <input type="date" name="date_quotation" {{$quotation->date_quotation}}>
    <input type="date" name="valid_until" {{$quotation->valid_until}}>
    <input type="number" name="tax"{{$quotation->tax}}>
    <input type="submit" value="envoyer">
</form>
</body>
</html>
