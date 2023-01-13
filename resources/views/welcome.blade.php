@extends('layouts.app')

@section('content')

    <form action={{route('student.store')}} method="POST" >
        @csrf
        <div class="container" id="container" >

            {{__('messages.hello')}}

            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control check" name="name" id="name" required>
            </div>

            <br>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control check">
            </div>
            <br>

            <div class="form-group">
                <label for="subject_id">Choose subject</label>
                <select name="subject_id" id="subject" class="form-select form-select-lg check">
                    <option selected disabled>Choose</option>
                    @foreach($subjects as $subject)
                        <option value={{$subject->id}}>{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>

            <br>

            <div class="form-group">
                <label for="teacher_id">Choose teacher</label>
                <select name="teacher_id" id="teacher" class="form-select form-select-lg check">
                    <option selected disabled>Choose</option>
                </select>
            </div>

            <br>

            <button type="submit" id="submit" disabled class="btn btn-lg col-auto bg-dark text-white">Start test</button>

        </div>
    </form>
@endsection

@push('scripts')

    <script>

       $(document).ready(function (){

          // button disabled
           $('.check').on('change', function (){
               let input = document.getElementsByClassName('check');

               let flag = 0;
               for (let i = 0; i < input.length; ++i) {
                   if(input[i].value === "" || input[i].value === "Choose") {
                      continue;
                   }else{
                       ++flag;
                   }
                   console.log(input[i].name);
                   console.log(flag);
               }

               if (flag != 4) {
                   document.getElementById('submit').disabled = true;
               } else {
                   document.getElementById('submit').disabled = false;
               }
           })

           // get list teachers
           $('#subject').on('change', function (){

               $.get('/api/subject-teachers/'+$(this).val(), function (data){
                   data = data.teachers;
                   let option = document.createElement('option');
                   option.value = 'Choose';
                   option.innerText = 'Choose';
                   $('#teacher').empty();
                   $('#teacher').append(option);
                   console.log(data);

                   for(let i=0; i<data.length; ++i){
                       let option = document.createElement('option');
                        // console.log(data[i]);
                        option.value = data[i].id;

                        option.innerText = data[i].name;

                        $('#teacher').append(option);
                   }
               })
           })
       })

    </script>
@endpush


