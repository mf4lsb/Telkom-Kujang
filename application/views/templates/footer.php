
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Telkom Kujang Bogor 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal Delete-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure for delete?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger confirm_delete" href="#">Delete</a>
        </div>
      </div>
    </div>
  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Scripts of Data Tables -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  
  <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>



  <!-- Scripts of Datepicker -->
  <script type="text/javascript" src="<?= base_url('assets/'); ?>js/bootstrap-datepicker.min.js"></script>

  <script>
    $('#submenu_table, #sto_table, #datel_table, #user_table').DataTable({
    });

    $('#alpro_table, #odc_table').DataTable({
      // "processing": true,
      // "serverSide": true,
      scrollX: true,
      scrollY: '300px',
      // "ajax": {
      //   url: "<?php //echo base_url('admin/fetch');?>",
      //   type: "post"
      // },
      dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    

    //ModalforImgODC
    /*$('.pop').on('click', function(){
      $('.imagepreview').attr('src',
      $(this).find('image').attr('src'));
      $('#imagemodal').modal('show');
    });*/

    //Modal for IMG ODC
    $('#odc_table').on('click', '.pop', function(){
      //const odc_id = $(this).attr('id');
      var odc_id = $(this).data('row_id');
      $.ajax({
        url: "<?= base_url('asman/getpicture');?>",
        method: "post",
        data: {
          odc_id: odc_id
        },
        success: function(data){
          $('#picture_detail').html(data);
          $('#imagemodal').modal("show");
        }
      });
    });


    $('#date').datepicker({
      format: "dd-MM-yyyy",
      autoclose: true,
      orientation: "bottom auto",
      daysOfWeekHighlighted: "0",
      todayHighlight: true
    });

    //upload file profile
    $('.custom-file-input').on('change', function(){
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    //checked roleaccess
    $('input:checkbox[id^="roleaccess"]').on('click', function(){
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({
        url: "<?= base_url('admin/changeaccess'); ?>",
        type: 'post',
        data: {
          menuId: menuId,
          roleId: roleId
        },
        success: function(){
          document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
        }

      });
    });

    
    //checked role-user
    $('input:checkbox[id^="roleuser"]').on('click', function(){
      const usernameId = $(this).data('username');
      const isActive = $(this).data('active')

      $.ajax({
        url: "<?= base_url('admin/changerole'); ?>",
        type: 'post',
        data: {
          usernameId: usernameId, //object data: variabel || eps-wpu-9
          isActive: isActive
        },
        success: function(){
          document.location.href = "<?= base_url('admin/roleuser'); ?>";
        }

      });
    });


    //checked useraccess page
    $('input:checkbox[id^="useraccess"]').on('click', function(){
      const userId = $(this).data('user');
      const stoId = $(this).data('sto');

      $.ajax({
        url: "<?= base_url('admin/changeaccess_user'); ?>",
        type: 'post',
        data: {
          userId: userId,
          stoId: stoId
        },
        success: function(){
          document.location.href = "<?= base_url('admin/useraccess/'); ?>" + userId;
        }

      });
    });


    //getSTOfromDatel || ALPRO PAGE
    /*$('#datel_id').change(function(){
      var datel_id = $('#datel_id').val();
      if(datel_id != '')
      {
        $.ajax({
          url: "",
          type: 'post',
          data:{
            datel_id: datel_id
          },
          success: function(data)
          {
            $('#sto').html(data);
          }
        });
      }
      else{
        $('#sto').html('<option value="">Pilih STO</option>');
        $('#odc').html('<option value="">Pilih ODC</option>');
      }
    });*/

    //getODCfromSTO || ALPRO PAGE
    $('#sto').change(function(){
      var sto_id = $('#sto').val();
      if(sto_id != '')
      {
        $.ajax({
          url: "<?= base_url('user/getodc'); ?>",
          type: 'post',
          data:{
            sto_id: sto_id  // ***
          },
          success: function(data) // ***
          {
            $('#odc').html(data);
          }
        });
      }
      else{
        $('#odc').html('<option value="">Choose ODC</option>');
      }
    });
    
    //getRADIOfromPORT || ALPRO PAGE
    $('#port').change(function(){
      var port = $('#port').val();
      if(port != '')
      {
        $.ajax({
          url: "<?= base_url('user/getradio'); ?>",
          type: 'post',
          data:{
            port: port  // ***
          },
          success: function(data) // ***
          {
            $('#radio').html(data);
          }
        });
      }
      else{
        $('#radio').html('<div></div>');
      }
    });


    //getRADIOfromPORT || ALPRO EDIT PAGE
    $('#port_edit').change(function(){
      var port = $('#port_edit').val();
      if(port != '')
      {
        $.ajax({
          url: "<?= base_url('user/getradio'); ?>",
          type: 'post',
          data:{
            port: port  // ***
          },
          success: function(data) // ***
          {
            $('#radio').html(data);
          }
        });
      }
      else{
        $('#radio').html('<div></div>');
      }
    });


    //edit live datel
    $(document).on('blur', '.table_datel', function(){
      var id = $(this).data('row_id');
      var table_column = $(this).data('column_name');
      var value = $(this).text();
      $.ajax({
        url: "<?= base_url('asman/updatedatel'); ?>",
        method: 'post',
        data: {
          id: id,
          table_column: table_column,
          value: value
        },
        success: function(data)
        {
          document.location.href = "<?= base_url('asman/datel'); ?>";
        }
      });
    });

    //edit live alpro
    $(document).on('blur', '.table_alpro', function(){
      var id = $(this).data('row_id');
      var table_column = $(this).data('column_name');
      var value = $(this).text();
      $.ajax({
        url: "<?= base_url('user/updatealpro'); ?>",
        method: 'post',
        data: {
          id: id,
          table_column: table_column,
          value: value
        },
        success: function(data)
        {
          document.location.href = "<?= base_url('user/alpro'); ?>";
        }
      });
    });
    

    //edit live odc
    $(document).on('blur', '.table_odc', function(){
      var id = $(this).data('row_id');
      var table_column = $(this).data('column_name');
      var value = $(this).text();
      $.ajax({
        url: "<?= base_url('asman/updateodc'); ?>",
        method: 'post',
        data: {
          id: id,
          table_column: table_column,
          value: value
        },
        success: function(data)
        {
          document.location.href = "<?= base_url('asman/odc'); ?>";
        }
      });
    });
    

    //edit live STO
    $(document).on('blur', '.table_sto', function(){
      var id = $(this).data('row_id');
      var table_column = $(this).data('column_name');
      var value = $(this).text();
      $.ajax({
        url: "<?= base_url('asman/updatesto'); ?>",
        method: 'post',
        data: {
          id: id,
          table_column: table_column,
          value: value
        },
        success: function(data)
        {
          document.location.href = "<?= base_url('asman/sto'); ?>";
        }
      });
    });
    

    //edit live Competitor
    $(document).on('blur', '.table_competitor', function(){
      var id = $(this).data('row_id');
      var table_column = $(this).data('column_name');
      var value = $(this).text();
      $.ajax({
        url: "<?= base_url('admin/updatecompetitor'); ?>",
        method: 'post',
        data: {
          id: id,
          table_column: table_column,
          value: value
        },
        success: function(data)
        {
          document.location.href = "<?= base_url('admin/competitor'); ?>";
        }
      });
    });
    
    
    //edit live Sub Menu
    $(document).on('blur', '.table_sub_menu', function(){
      var id = $(this).data('row_id');
      var table_column = $(this).data('column_name');
      var value = $(this).text();
      $.ajax({
        url: "<?= base_url('menu/updatesubmenu'); ?>",
        method: 'post',
        data: {
          id: id,
          table_column: table_column,
          value: value
        },
        success: function(data)
        {
          document.location.href = "<?= base_url('menu/submenu'); ?>";
        }
      });
    });


    //delete table datel
    $('#datel_table').on('click', '.delete_datel', function(){
      var id = $(this).data('row_datel_id');
      // /$('#deleteModal').modal("show");
      $('.confirm_delete').on('click', function(){
        $.ajax({
          url: "<?= base_url('asman/deletedatel'); ?>",
          method: "post",
          data: {
            id: id
          },
          success: function(data)
          {
            document.location.href = "<?= base_url('asman/datel'); ?>";
          }
        });
      });
    });
    
    
    //delete table sto
    $('#sto_table').on('click', '.delete_sto', function(){
      var id = $(this).data('row_id');
      // /$('#deleteModal').modal("show");
      $('.confirm_delete').on('click', function(){
        $.ajax({
          url: "<?= base_url('asman/deleteSTO'); ?>",
          method: "post",
          data: {
            id: id
          },
          success: function(data)
          {
            document.location.href = "<?= base_url('asman/sto'); ?>";
          }
        });
      });
    });
    
    
    //delete table competitor
    $('#competitor_table').on('click', '.delete_competitor', function(){
      var id = $(this).data('row_id');
      // /$('#deleteModal').modal("show");
      $('.confirm_delete').on('click', function(){
        $.ajax({
          url: "<?= base_url('admin/deletecompetitor'); ?>",
          method: "post",
          data: {
            id: id
          },
          success: function(data)
          {
            document.location.href = "<?= base_url('admin/competitor'); ?>";
          }
        });
      });
    });
    
    
    //delete table alpro
    $('#alpro_table').on('click', '.delete_alpro', function(){
      var id = $(this).data('row_id');
      // /$('#deleteModal').modal("show");
      $('.confirm_delete').on('click', function(){
        $.ajax({
          url: "<?= base_url('user/deletealpro'); ?>",
          method: "post",
          data: {
            id: id
          },
          success: function(data)
          {
            document.location.href = "<?= base_url('user/alpro'); ?>";
          }
        });
      });
    });
    
    
    //delete table odc
    $('#odc_table').on('click', '.delete_odc', function(){
      var id = $(this).data('row_id');
      var img = $(this).data('row_img');
      // /$('#deleteModal').modal("show");
      $('.confirm_delete').on('click', function(){
        $.ajax({
          url: "<?= base_url('asman/deleteODC'); ?>",
          method: "post",
          data: {
            id: id,
            img: img
          },
          success: function(data)
          {
            document.location.href = "<?= base_url('asman/odc'); ?>";
          }
        });
      });
    });
    
    
    //delete table sub menu
    $('#submenu_table').on('click', '.delete_sub_menu', function(){
      var id = $(this).data('row_id');
      // /$('#deleteModal').modal("show");
      $('.confirm_delete').on('click', function(){
        $.ajax({
          url: "<?= base_url('menu/deletesubmenu'); ?>",
          method: "post",
          data: {
            id: id
          },
          success: function(data)
          {
            document.location.href = "<?= base_url('menu/submenu'); ?>";
          }
        });
      });
    });
    

    //update table user choose role
    $(document).on('click', '.update_role', function(event){
      event.preventDefault();
      var user_id = $(this).attr("id");
      $('#editModal').modal('show');
      $('#user_id').val(user_id);
    });

    $(document).on('submit', '#role_form', function(event){
      event.preventDefault();
      var role_id = $('#role_id').val();
      $.ajax({
        url: "<?= base_url('admin/editrole');?>",
        method: "post",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(data)
        {
          $('#role_form')[0].reset();
          $('#editModal').modal('hide');
          // dataTable.ajax.reload();
          document.location.href = "<?= base_url('admin/roleuser'); ?>";
        }
      })
    });

    
    //delete table user by id
    $('#user_table').on('click', '.delete_user', function(){
      var id = $(this).data('row_id');
      // /$('#deleteModal').modal("show");
      $('.confirm_delete').on('click', function(){
        $.ajax({
          url: "<?= base_url('admin/deleteuser'); ?>",
          method: "post",
          data: {
            id: id
          },
          success: function(data)
          {
            document.location.href = "<?= base_url('admin/roleuser'); ?>";
          }
        });
      });
    });



  </script>

</body>

</html>