<html>
<head></head>
<body>
<table align="center" width="60%" border="1">
    <tr>
        <th>id</th>
        <th>status</th>
        <th>comment</th>
        <th>date</th>
        <th>valid until</th>
        <th>tax</th>
        <th>operations</th>
    </tr>
@foreach($quotations as $quotation)
    <tr>
        <td>{{$quotation->id}}</td>
        <td>{{$quotation->status}}</td>
        <td>{{$quotation->comment}}</td>
        <td>{{$quotation->date_quoatation}}</td>
        <td>{{$quotation->valid_until}}</td>
        <td>  {{$quotation->tax}}</td>
        <td>
            <a href="/quotations/update/{{$quotation->id}}">update</a>
            <button href="/quotations/delete/{{$quotation->id}}" onclick="confirm("voulez vous vraiment supprimer cette ligne")x;">delete</button>
        </td>
    </tr>

@endforeach

</body>
</html>
