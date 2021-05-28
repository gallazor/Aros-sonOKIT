<?php
$title = "Note";

require("header.php");

?>


  <div class="container my-5 text-white">
    <h2>Ny note</h2>
    <form action="/aros-sonOKIT/note.php/?update=true" method="post">
      <div class="form-group">
        <label for="title">Titel</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" />
      </div>
      <div class="form-group">
        <label for="desc">Note</label>
        <textarea class="form-control" id="note" name="note" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Tilføj note</button>
    </form>
  </div>

  <div class="container my-4">


    <table class="table text-white" id="myTable">
      <thead>
        <tr>
          <th scope="col">Note id</th>
          <th scope="col">Titel</th>
          <th scope="col">Notat</th>
          <th scope="col">Slet</th>
        </tr>
      </thead>
      <tbody>


        <?php
$sql = "SELECT * FROM `newnote`";
$result = mysqli_query($conn, $sql);
$note_id = 0;
while($row = mysqli_fetch_assoc($result)){
  $note_id = $note_id + 1;
   echo " <tr>
   <th scope='row'>".$note_id." </th>
   <td>".$row['title']."</td>
   <td>".$row['note']."</td>
  <td><button class='delete btn btn-sm btn-danger' id=d".$row['note_id'].">Slet</button></td>
 </tr>";
    }
        ?>


      </tbody>
    </table>
  </div>
  <hr>


  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>

  <script>

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        note_id = e.target.id.substr(1,);

        if (confirm("Er du sikker på at du vil slette denne note?")) {
          console.log("yes");
          window.location = `/aros-sonOKIT/note.php/?delete=${note_id}`;

        } else {
          console.log("no");
        }

      })
    })

  </script>

</body>

</html>
