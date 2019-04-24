<form style="display:inline" action="{{ url($table.'/'.$id) }}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit" onclick='return confirm("削除してよろしいですか？");' class="btn btn-primary">
        {{ __('削除') }}
    </button>
</form>
