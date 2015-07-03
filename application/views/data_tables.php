<table class="table">
  <thead>
    <tr>
    <?php foreach ($col as $key => $value) {
      echo "<th>$key</th>";
    }?>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $no = 1;
    foreach ($list as $r) {
      echo "<tr>";
      echo "<td>$no</td>";
      foreach ($col as $key => $value) {
        if($value != 'id')
          echo "<td>$value</td>";
      }
      $no++;
      echo "<td>
        <a href='javascript:void(0)' class='btn btn-xs btn-info' onclick=\"editClick('$r[id]')\"><i class='fa fa-edit'></i> Edit</a>
        <a href='javascript:void(0)' class='btn btn-xs btn-danger' onclick=\"hapusClick('$r[id]')\"><i class='fa fa-minus'></i> Delete</a>
      </td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $("#tb").DataTable({
      'bSort':false,
    });
  });
  var berforeSendLoading = bootbox.dialog({
        title: "Loading",
        message: "<div class='progress sm progress-striped active'>"+
                      "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='100'"+
                          "aria-valuemin='0' aria-valuemax='100' style='width: 100%'>"+
                          "<span class='sr-only'>Loading</span>"+
                      "</div>"+
                  "</div>",
        closeButton: false,
        show: false,
      });
  var successDialog = bootbox.dialog({
        title: "Success",
        message: "<div class='alert alert-success alert-dismissable'>"+
                      "<i class='fa fa-check'></i>"+
                      "<b>Alert!</b> Success Saved"+
                  "</div>",
        closeButton: true,
        show: false,
      });
  var errorDialog = bootbox.dialog({
        title: "ERROR. . .",
        message: "<div class='alert alert-danger alert-dismissable'>"+
                      "<i class='fa fa-ban'></i>"+
                      "<b>Alert!</b> Error, terjadi kesalahan pada server. hubungi admin aplikasi"+
                  "</div>",
        closeButton: true,
        show: false,
      });
  function editClick (id) {
    
    
  }
  function hapusClick (id) {
    
  }
</script>