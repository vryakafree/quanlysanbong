<form action="{{ route('fields.store') }}" method="post">
    {{ csrf_field() }}
    Field name:
    <br />
    <input type="text" name="field_name" />
    <br /><br />
    Cost:
    <br />
    <input type="text" name="cost" />
    <br /><br />
    Type id:
    <br />
    <input type="text" name="type_id" />
    <br /><br />
    <input type="submit" value="Save" />
</form>
