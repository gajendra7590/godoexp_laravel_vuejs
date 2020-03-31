function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    let type = input.files[0].type;

       if( typeof(type)!=undefined){
          if( (type == 'image/jpeg') || (type == 'image/jpg') || (type == 'image/png') ) {
                reader.onload = function(e) {
                    $('#inputImagePreview').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
          }else{
            $('#inputImagePreview').attr('src', '/images/default.png');
            input.value = '';
          }
       }
  }
}

$(document).on('change','#inputFileChooser',function(){
    readURL(this);
});

// $("#inputFileChooser").change(function() {
//    readURL(this);
// });
