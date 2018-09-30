/**
 * Upload script for PDF & analyse
 * 
 * TODO Make UI + error reporting more nice
 */
$(document).ready(function() {

  $("#submitToRM").dmUploader({
    url: 'https://sinpexapp-cwerdich.c9users.io/crm/index.php/tasks/submitToRM/' + $('#submitToRM').data('projectid') + '/' + $('#submitToRM').data('taskid'),
    allowedTypes: "application/pdf",
    extFilter: ["pdf"],

    //... More settings here...

    onInit: function() {
      console.log('Callback: Plugin initialized');
    },
    onBeforeUpload: function(id) {
      console.log('onBeforeUpload', id);
      $('#rm-loading').show();
    },
    onUploadProgress: function(id, percent) {
      console.log('onUploadProgress', id, percent);
    },
    onUploadCanceled: function(id) {
      console.log('onUploadCanceled');
      alert('Upload canceled');
      $('#rm-loading').hide();
    },
    onUploadError: function(id, xhr, status, errorThrown) {
      alert('Error due upload...'.errorThrown);
      console.error(errorThrown);
      console.error(xhr);
      console.error(status);
      $('#rm-loading').hide();
    },
    onNewFile: function(id, file) {
      console.log('Uploading ', file);
    },
    onUploadSuccess: function(id, data) {
      console.log('completed', id);
      $('#rm-loading').hide();
      //alert(data);
      if (data.hasOwnProperty('error')) {
        alert('ERROR: ' + data.error);
      }
      else {
        alert('Upload completed: ' + data.file.name);
        window.location.reload();
      }
    },
    onFileTypeError: function(file) {
      $('#rm-loading').hide();
      alert('Error - Provided file type is not supported.');
    },
    onFileExtError: function(file) {
      $('#rm-loading').hide();
      alert('Error - Provided file type is not supported.');
    }
    // ... More callbacks
  });
});
