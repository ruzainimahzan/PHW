
Dear <strong>{{ $name }}</strong>,
<br>
<br>

<p>
<strong>Your registration details as below :</strong>
<table border=0>
<tr>
    <td>
    Date : {{ date('d-m-Y') }}
    <td>
</tr>
<tr>
    <td>Name : {{ $name }}</td>
</tr>
<tr>
    <td>Username : {{ $email }}</td>
</tr>
<tr>
    <td>Password : {{ $password }}</td>

<tr>
</table>

</p>