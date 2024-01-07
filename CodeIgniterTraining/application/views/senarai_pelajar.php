<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Friendly Table</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <a href="<?= site_url('crud/addnew') ?>">
        <h1>Add New Student</h1>
    </a>
    <h1>User List</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Program</th>
                <th>IC NO</th>
            </tr>
        </thead>
        <tbody>
            <!-- For loop for each row by throwing each record into the row variable -->
            <?php foreach ($list->result() as $row) : ?>
                <tr>
                    <!-- placing data into the table -->
                    <td><?= $row->ID_PELAJAR ?></td>
                    <td><?= $row->NAMA_PELAJAR ?></td>
                    <td><?= $row->PROGRAM ?></td>
                    <td><?= $row->ICNO ?></td>
                    <td><a class="delete-link" href="<?= site_url('crud/delete/' . $row->ID_PELAJAR) ?>" onclick="return confirm('Are you sure you want to delete this record?')">DELETE</a></td>
                    <td><a class="delete-link" href="<?= site_url('crud/update/' . $row->ID_PELAJAR) ?>" onclick="return confirm('Are you sure you want to delete this record?')">UPDATE</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>