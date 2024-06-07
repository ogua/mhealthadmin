<link rel="stylesheet" href="{{ URL::to('css/bootstrap.mins.css')}}">
<h1 class="text-center">MEDICAL REPORT FOR {{ strtoupper($user->name) }}</h1>
<hr>

<table class="table table-bordered table-striped">
	<thead>
        <tr class="bg-info">
            <td colspan="4" class="text-center"><b>PATIENT DETAILS</b></td>
        </tr>
		<tr>
			<th><b>IMAGE</b></th>
            <th><b>NAME</b></th>
			<th><b>EMAIL</b></th>
			<th><b>PHONE</b></th>
		</tr>
	</thead>
	<tbody>
            <tr>
                <td>
            @if ($user->avatar)

            <img src="{{ asset('storage') }}/{{ $user->avatar }}" class="img-cirlce" width="70" height="70" alt="">
            
            @else

            @endif
            </td>
			<td>{{ $user->name}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->phone}}</td>
		</tr>

	</tbody>
</table>


<table class="table table-bordered table-striped">
	<thead>
        <tr class="bg-info">
            <td colspan="3" class="text-center"><b>MEDICATION LIST</b></td>
        </tr>
		<tr>
			<th><b>DRUG NAME</b></th>
			<th><b>UNIT</b></th>
			<th><b>DOSAGE</b></th>
		</tr>
	</thead>
	<tbody>
        @foreach ($user->medications as $medication)
            <tr>
			<td>{{ $medication->name}}</td>
            <td>{{ $medication->unit}}</td>
            <td>{{ $medication->dose}}</td>
		</tr>
        @endforeach

	</tbody>
</table>


<table class="table table-bordered table-striped">
	<thead>
        <tr class="bg-info">
            <td colspan="5" class="text-center"><b>MEASUREMENT INFORMATION</b></td>
        </tr>
		<tr>
			<th><b>TYPE</b></th>
			<th><b>VALUE</b></th>
            <th><b>STATUS</b></th>
			<th><b>DATE</b></th>
            <th><b>TIME</b></th>
		</tr>
	</thead>
	<tbody>
        @foreach ($user->measurements as $row)
            <tr>
			<td>{{ $row->mtype}}</td>
            <td>{{ $row->mvalue}}</td>
            <td>{{ $row->status}}</td>
            <td>{{ $row->mdate}}</td>
            <td>{{ $row->mtime}}</td>
		</tr>
        @endforeach

	</tbody>
</table>


<table class="table table-bordered table-striped">
	<thead>
        <tr class="bg-info">
            <td colspan="5" class="text-center"><b>ACTIVITIES INFORMATION</b></td>
        </tr>
		<tr>
			<th><b>TYPE</b></th>
			<th><b>MINUTES SPENT</b></th>
			<th><b>DATE</b></th>
            <th><b>TIME</b></th>
		</tr>
	</thead>
	<tbody>
        @foreach ($user->activities as $row)
            <tr>
			<td>{{ $row->atype}}</td>
            <td>{{ $row->mvalue}}(m)</td>
            <td>{{ $row->mdate}}</td>
            <td>{{ $row->mtime}}</td>
		</tr>
        @endforeach

	</tbody>
</table>


<table class="table table-bordered table-striped">
	<thead>
        <tr class="bg-info">
            <td colspan="5" class="text-center"><b>SYMPTOMS INFORMATION</b></td>
        </tr>
		<tr>
			<th><b>SYMPTOM</b></th>
			<th><b>MODE</b></th>
			<th><b>DATE</b></th>
            <th><b>TIME</b></th>
		</tr>
	</thead>
	<tbody>
        @foreach ($user->symptoms as $row)
            <tr>
			<td>{{ $row->symptoms}}</td>
            <td>{{ $row->mode}}</td>
            <td>{{ $row->mdate}}</td>
            <td>{{ $row->mtime}}</td>
		</tr>
        @endforeach

	</tbody>
</table>

<script type="text/javascript">
    function auto_print() {     
        window.print()
    }
    setTimeout(auto_print, 1000);
</script>