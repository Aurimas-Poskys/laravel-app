<div class="row mb-3">
      
    <div class="col-sm">

        <h4>Students</h4>

        <div class="row">

            <div class="col-md-6 col-sm-12 mt-2 mb-3">

                <table class="table table-bordered text-center students-table">

                    <thead class="thead-light">
                      <tr class="table-active">
                        <th scope="col">Student</th>
                        <th scope="">Group</th>
                        <th scope="">Actions</th>
                      </tr>
                    </thead>

                    <tbody>

                        @foreach($students as $student)

                        <tr>
                            <td>{{ $student->full_name }}</td>

                            <?php 
                                $gr_id = App\Models\Group::get()->first();
                            ?>
                             
                            @if (isset($student->group_id))

                            {{-- List Group from one in ascending order --}}
                            <td>Group #{{ $student->group_id - $gr_id->id + 1 }}</td>

                            @else
                            <td>-</td>
                            @endif

                            <td>
                                
                                <form action="{{ route('students_destroy', $student) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button>Delete</button>
                                </form>
                                
                            </td>
                        </tr>

                        @endforeach
                    
                    </tbody>

                  </table>

                  <a href="{{ route('students_create') }}" class="btn btn-secondary px-5">Add new student</a>

            </div>
    
        </div>

    </div>
 
</div>