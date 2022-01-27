<table class="table table-striped text-center table-bordered my-2">
    <thead class="bg-info text-white">
        <tr>
            <th colspan="2">User Details</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2"><?php echo "<img class='user_pic' src='$pic' height='150px' width='150px'><br/>"; ?>
                <a href="?page=changepic">Change Picture</a>
            </td>
        </tr>
        <tr>
            <td><b>Name:</b></td>
            <td><?php echo "$name"; ?></td>
        </tr>
        <tr>
            <td><b>Username:</b></td>
            <td><?php echo "$username"; ?></td>
        </tr>
        <tr>
            <td><b>Email:</b></td>
            <td><?php echo "$mail"; ?></td>
        </tr>
        <tr>
            <td><b>Age:</b></td>
            <td><?php echo "$age"; ?></td>
        </tr>
        <tr>
            <td><b>Gender:</b></td>
            <td><?php echo "$gen"; ?></td>
        </tr>
        <tr>
            <td><b>City:</b></td>
            <td><?php echo "$city"; ?></td>
        </tr>
        <tr>
            <td><b>Mobile:</b></td>
            <td><?php echo "$mob"; ?></td>
        </tr>
    </tbody>
</table>