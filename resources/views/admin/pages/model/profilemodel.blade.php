<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ route('add_education')}}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Level of
                                Education </label>
                            <select name="level_of_education" class="form-control">
                                <option value="0">Select</option>
                                <option value="1">PSC/5 pass</option>
                                <option value="2">JSC/JDC/8 pass</option>
                                <option value="3">Secondary</option>
                                <option value="4">Higher Secondary</option>
                                <option value="5">Diploma</option>
                                <option value="6">Bachelor/Honors</option>
                                <option value="7">Masters</option>
                                <option value="8">PhD (Doctor of Philosophy)</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Exam/Degree
                                Title</label>
                            <input type="text" name="degree_title" class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Concentration/
                                Major/Group </label>
                            <input type="text" name="concentration" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Board </label>
                            <input type="text" name="board" class="form-control" id="">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputName" class="col-form-label">Institute
                                Name</label>
                            <input type="text" name="institute_name" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Result </label>
                            <select name="result" class="form-control">
                                <option value="0">Select</option>
                                <option value="1">First Division/Class</option>
                                <option value="2">Second Division/Class</option>
                                <option value="3">Third Division/Class</option>
                                <option value="4">Grade</option>
                                <option value="5">Appeared</option>
                                <option value="6">Enrolled</option>
                                <option value="7">Awarded</option>
                                <option value="8">Do not mention</option>

                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">CGPA</label>
                            <input type="text" name="cgpa" class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="inputName" class="col-form-label">Scale </label>
                            <input type="text" name="scale" class="form-control" id="">
                        </div>
                        <div class="col-sm-4">
                            <label for="inputName" class="col-form-label">Marks </label>
                            <input type="text" name="marks" class="form-control" id="">
                        </div>
                        <div class="col-sm-4">
                            <label for="inputName" class="col-form-label">Year of passing </label>
                            <input type="text" name="year_of_passing" class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Duration (Years)</label>
                            <input type="text" name="duration" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Achievement</label>
                            <input type="text" name="achievement" class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-12 col-sm-12">
                            <button type="submit" class="btn btn-success btn-block btn-sm">SAVE</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- traning model -->

<div class="modal fade" id="training-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="post" action="{{route('add_training')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Training
                                Title</label>
                            <input type="text" name="title" value="" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Country </label>
                            <input type="text" name="country" value="" class="form-control" id="">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Topics
                                Covered</label>
                            <input type="text" name="topics" value="" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Training Year
                            </label>
                            <input type="number" name="year" value="" placeholder="YYYY" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Duration </label>
                            <input type="text" name="duration" value="" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Institute </label>
                            <input type="text" name="institute" value="" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputName" class="col-form-label">Location </label>
                            <input type="text" name="location" value="" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-12 col-sm-12">
                            <button type="submit" class="btn btn-success btn-block btn-sm">SAVE</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- employment Model  -->
<div class="modal fade" id="employment-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" action="{{route('add_employement')}}" method="post">
                    @csrf
                    <h5>Employment </h5>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Company
                                Name</label>
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Company Business
                            </label>
                            <input type="text" name="business" v class="form-control" id="">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Designation</label>
                            <input type="text" name="designation" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Department
                            </label>
                            <input type="text" name="department" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputName" class="col-form-label">Area of
                                Experiences </label><span> Use (,)</span>

                            <input type="text" name="experiences" data-role="tagsinput">

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputName" class="col-form-label">
                                Responsibilities </label>
                            <textarea class="form-control" name="responsibilities" rows="3"
                                placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputName" class="col-form-label">Company Location
                            </label>
                            <input type="text" name="location" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Employment Period</label>
                            <input type="text" name="start_period" required placeholder="From date (MM/DD/YYYY)"
                                class="form-control" onfocus="(this.type='date')" />
                        </div>
                        <div class="col-sm-6">
                            <input type="text" style="margin-top:37px ;" placeholder="To date (MM/DD/YYYY)" 
                                name="end_period" onfocus="(this.type='date')" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-12 col-sm-12">
                            <button type="submit" class="btn btn-success btn-block btn-sm">SAVE</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- employment Model  -->
<div class="modal fade" id="skill-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ route('add_skill')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputName" class="col-form-label">Skill</label>
                            <input type="text" name="skill" value="" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputName" class="col-form-label">How did you learn the skill?</label>
                            <input type="text" name="learnby" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div class="modal fade" id="language-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{route('add_languageskill')}}">
                    @csrf
                    <h4>Language </h4>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Language</label>
                            <input type="text" name="language" class="form-control" id="">
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName"  class="col-form-label">Reading</label>
                            <select name="reading" class="form-control" id="">
                                <option value="Select">Select</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Writing</label>
                            <select name="writing" class="form-control" id="">
                                <option value="Select">Select</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="inputName" class="col-form-label">Speaking</label>
                            <select name="speaking" class="form-control" id="">
                                <option value="Select">Select</option>
                                <option value="High">High</option>
                                <option value="Medium">Medium</option>
                                <option value="Low">Low</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>