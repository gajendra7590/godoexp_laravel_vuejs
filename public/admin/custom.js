function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#inputImagePreview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$(document).on('change','#inputFileChooser',function(){
    readURL(this);
});

// $("#inputFileChooser").change(function() {
//    readURL(this);
// });
