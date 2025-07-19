<!DOCTYPE html>
<html>
<head>
    <title>Student Registrations</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Ensure fixed width distribution */
            font-size: 12px; /* Slightly smaller for better fitting */
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
            vertical-align: top;
            word-wrap: break-word;
        }

        th:nth-child(1), td:nth-child(1) { width: 4%; }   /* ID */
        th:nth-child(2), td:nth-child(2) { width: 12%; }  /* Name */
        th:nth-child(3), td:nth-child(3) { width: 10%; }  /* Roll No */
        th:nth-child(4), td:nth-child(4) { width: 16%; }  /* Email */
        th:nth-child(5), td:nth-child(5) { width: 12%; }  /* Phone */
        th:nth-child(6), td:nth-child(6) { width: 10%; }  /* Department */
        th:nth-child(7), td:nth-child(7) { width: 20%; }  /* Clubs */
        th:nth-child(8), td:nth-child(8) { width: 16%; }  /* Created At */
    </style>
</head>
<body>
    <h2>Student Registrations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roll No</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Clubs</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->roll_no }}</td>
                    <td>{{ $s->email }}</td>
                    <td>{{ $s->phone }}</td>
                    <td>{{ $s->department }}</td>
                    <td>
                        @foreach ($s->clubs as $club)
                            {{ $club->club_name }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>{{ $s->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
