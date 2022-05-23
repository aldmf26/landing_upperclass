<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Tutorial Laravel Mail | ayongoding.com</title>
</head>
<body>
    <p>Hallo <b>{{$penerima}}</b> berikut ini adalah pesan Dari {{$email}}:</p>
    <table>
      <tr>
        <td>Pesan</td>
        <td>:</td>
        <td>{{$msg}}</td>
      </tr>
      
    </table>
    <p>Terimakasih <b>{{$email}}</b> telah memberi komentar.</p>
</body>
</html>