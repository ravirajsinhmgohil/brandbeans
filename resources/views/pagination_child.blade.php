@foreach ($writer as $data)
<tr>
    <td>{{ $data->title }}</td>
    <td>{{ $data->categoryName }}</td>
    @if($data->status == "Pending")
    <td class="text-danger"><b>{{ $data->status }}</b></td>
    @else
    <td class="text-success"><b>{{ $data->status }}</b></td>
    @endif
    <td><a class="btn btn-primary btn-sm" href="{{ route('writer.edit', $data->id) }}">Edit</a> <a class="btn btn-danger btn-sm" href="{{ route('admincategory.delete', $data->id) }}">Delete</a>
    </td>
</tr>
@endforeach

<tr>
    <td colspan="3" align="center">
        {!! $writer->links('pagination.custom') !!}
    </td>
</tr>