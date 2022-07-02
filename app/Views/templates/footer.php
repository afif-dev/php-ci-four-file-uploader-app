
  <footer class="footer">
    &copy; 2022, <a href="https://github.com/afif-dev" target="_blank">afif-dev</a>
  </footer>
</div>

<div id="sample-modal" class="modal">
  <div class="modal-background jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Confirm action</p>
      <button class="delete jb-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <p>This will permanently delete <b>Some Object</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button jb-modal-close">Cancel</button>
      <button class="button is-danger jb-modal-close">Delete</button>
    </footer>
  </div>
  <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="/assets/js/main.js"></script>

<script src="/assets/js/dropzone/dist/min/dropzone.min.js"></script>
<script>
    // Dropzone Image
    Dropzone.options.myDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 1.5, // MB
        acceptedFiles: 'file,image/jpg,image/jpeg,image/gif,image/png',
        uploadMultiple: true,
        parallelUploads: 10,
        init: function() {
            var myDropzone = this;
            this.on("addedfile", file => {
              console.log("A file has been added");
            });
            this.on("complete", file => {
              console.log("A file has been complete!");
            });
        }
    };

    // Dropzone PDF
    Dropzone.options.myDropzonePdf = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 1, // MB
        acceptedFiles: 'application/pdf',
        uploadMultiple: true,
        parallelUploads: 10,
        init: function() {
            var myDropzone = this;
            this.on("addedfile", file => {
            console.log("A file has been added");
            });
            this.on("complete", file => {
            console.log("A file has been complete!");
            });
        }
    };
</script>

</body>
</html>