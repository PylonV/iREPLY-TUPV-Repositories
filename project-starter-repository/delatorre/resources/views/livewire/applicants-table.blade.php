<div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicants as $applicant)
                <tr wire:key={{ $applicant->id }}>
                    <td>{{ $applicant->name }}</td>
                    <td>
                        <form action="{{ route('applicants.destroy', $applicant->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            @if(count($applicants) == 0)
                <tr>
                    <td colspan="4">No Applicants</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
