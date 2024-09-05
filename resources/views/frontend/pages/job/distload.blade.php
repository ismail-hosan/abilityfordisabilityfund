 <label> District *</label>
<select class="form-control" name="district" id="district">
    <option value="" selected="" disabled="">Select A Districts</option>
    @foreach($allDistricts as $each)
    <option value="{{ $each->id }}">{{ $each->name }}</option>
    @endforeach
</select>