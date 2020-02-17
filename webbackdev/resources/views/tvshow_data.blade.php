<div class="table-responsive">
    <table class="table  table-striped" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Season</th>
            <th>Episode</th>
            <th>Quote</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
	@if(count($showlist) > 0)
    

 
    @foreach ($showlist as $shows)

        <tr class="show{{ $shows->id }}">
            <td>{{ $shows->id }}</td>
            <td>{{ $shows->season }}</td>
            <td>{{ $shows->episode }}</td>
            <td>{{ $shows->quote }}</td>
            <td><img src="{{ $shows->image }}"></td>
            <td>
                <a data-toggle="modal" data-target="#updatetvshowDialog" data-id="{{ $shows->id }}" 
                data-season="{{ $shows->season }}" data-quote="{{ $shows->quote }}" 
                data-episode="{{ $shows->episode }}"class="open-updatetvshowDialog btn btn-primary ">
                    <span class="glyphicon glyphicon-pencil">Edit</span>
                </a>
            </td>
            <td>
                <span class="deletetvshow delete-modal btn btn-danger"  id="deletetvshow"  data-toggle="modal" data-target="#deletemodel"   data-del-id="{{ $shows->id }}">
                    Delete
                </span>
	        </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="8" class="align-center">
               
            </td>
        </tr>
		@else
			<tr class="emptyshowdata">
            <td colspan="8" class="align-center">
                No data
            </td>
        </tr>
		@endif
    </tbody>
    </table>    
</div>