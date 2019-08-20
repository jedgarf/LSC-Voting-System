<script>
function submitForm(e) {
            
  var form_data = new FormData(document.getElementById("myform"));
  form_data.append("label", "WEBUPLOAD");
  $.ajax({
      url: "create_account_submit.php",
      type: "POST",
      data: form_data,
      processData: false,  // tell jQuery not to process the data
      contentType: false   // tell jQuery not to set contentType
  }).done(function( data ) {
    console.log(data);
    //Perform ANy action after successfuly post data
       
  });
  return false;     
}
</script>