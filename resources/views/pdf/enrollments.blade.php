<!DOCTYPE html>
<html>
<head>
    <title>Registrations PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
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
                    <td>{{ $s->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
