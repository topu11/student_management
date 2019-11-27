@extends('master')
@section('title')
    create student
@endsection
@section('content')

<form class="form-horizontal" id="myForm" action="{{route('store')}}" method="POST" data-parsley-validate>
    {{@csrf_field()}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </ul>
      </div>
    @endif


    <div class="form-group">
      <label class="control-label col-sm-2" for="student_id">student_id:</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="student_id" name="student_id" placeholder="Enter student_id" data-parsley-minlength="7" data-parsley-maxlength="7" required>
      </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="student_name">Student_name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="student_name" name="student_name" placeholder="Enter student_name" data-parsley-length="[10, 25]" required>
        </div>
      </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="department">Department:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="department" name="department" placeholder="Enter department"  required>
      </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="cell_phone">Cell_phone:</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="cell_phone" name="cell_phone" placeholder="Enter cell_phone" data-parsley-minlength="11" data-parsley-maxlength="12" required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="mail_address">Email_address:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="mail_address" name="mail_address"  placeholder="Enter email_address" data-parsley-type="email"  required>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="student_info">Student_info:</label>
        <div class="col-sm-10">
          <textarea  class="form-control" id="student_info" name="student_info"  placeholder="Enter student_info" rows="10"></textarea>
        </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success" id="submit">Submit</button>
        <script>
            document.getElementById('submit').onclick=function()
            {
              var x=confirm('are sure go');
              if(x)
              {
                return true;
              }
              else
              {
                return false;
              }
            }
          </script>
          <button type="reset" class="btn btn-success" id="cancel">Cancel</button>
           {{-- <input type="button"  id="cancel" value="cancel"> --}}
      </div>
    </div>
  </form>
  <script>
        document.getElementById('cancel').onclick=function()
        {
          var x=confirm('are sure go');
          if(x)
          {
             document.getElementById('myForm').reset();
          }

        }
      </script>
@endsection

