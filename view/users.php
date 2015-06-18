<main>
    <div id="status"></div>
    <table id="user-table">
        <thead>
        <tr>
            <th>UserID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user) {
            echo '<tr class="existing">';
            echo '<td id="userId" contenteditable="false">' . $user["userID"] . '</td>';
            echo '<td id="firstname:' . $user["userID"] . '" contenteditable="true">' . $user["firstname"] . '</td>';
            echo '<td id="lastname:' . $user["userID"] . '" contenteditable="true">' . $user["lastname"] . '</td>';
            echo '<td id="userEmail:' . $user["userID"] . '" contenteditable="true"> ' . $user["userEmail"] . '</td>';
            echo '</tr>';
        }
        ?>
        <tr class="new">
            <td id="userId" contenteditable="false"></td>
            <td id="firstname" contenteditable="true"></td>
            <td id="lastname" contenteditable="true"></td>
            <td id="userEmail" contenteditable="true"></td>
            <td>
                <button type="button" id="new-user-button"
                ">Add</button></td>
        </tr>
        </tbody>
    </table>
</main>
<script type="text/javascript">
    $('document').ready(function () {
        listenForUserChange();
    });
    $('#new-user-button').click(function () {
        addNewUser();
    });
</script>