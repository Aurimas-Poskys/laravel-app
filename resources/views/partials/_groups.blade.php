<div class="row mb-3">
      
    <div class="col-sm">

        <h4>Groups</h4>

        <div class="row text-center">
        
            @foreach($project->studentGroups as $group)

            <div class="col-md-3 col-sm-6 mt-2">

                <table class="table table-bordered groups-table">

                    <thead class="thead-light">

                        <tr class="table-active">
                            <th scope="col">Group #{{ $loop->index + 1 }}</th>
                        </tr>

                    </thead>

                    <tbody>


                        @foreach($group->students as $student)

                        <tr>
                            <td>
                                {{ $student->full_name }}
                            </td>
                        </tr>

                        @endforeach


                        @for ($j = count($group->students); $j < $project->students; $j++)

                        </tr>
                            <td>

                                <select class="form-select" id="group_students" data-id="{{ $group->id }}" data-route="{{ route('student_to_group', $group) }}" name="group_students" aria-label="select">

                                    <option selected>Assign student</option>

                                    @foreach($students->whereNull('group_id') as $student)
                                    <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                                    @endforeach

                                </select>
                            
                            </td>
                        </tr>

                        @endfor
                    
                    </tbody>
                    
                </table>

            </div>

            @endforeach

        </div>

    </div>

</div>