
<select class="form-control" name="thana" >
    <option value="" selected="" disabled="">Select A Thana</option>
    @foreach($allThana as $each)
    <option value="{{ $each->id }}">{{ $each->name }}</option>
    @endforeach
</select>