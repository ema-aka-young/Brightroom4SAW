//class tinymce -->
tinymce.init({
  selector: 'textarea.tinymce',
  height: 500,
  menubar: false,
  paste_data_images: true,
  plugins: [
    'advlist autolink lists link image charmap print paste preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime image media table paste code help wordcount'
  ],
  toolbar: 'undo redo | formatselect | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat | link  code |  help  ',

   image_advtab: true,

});
