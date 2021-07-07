<nav>
         <div class="card">
             <div class="card-body">
             <h1>Forum <?php echo $forum->name ?></h1>

                 <?php if (!$this->session->userdata('admin')):
                   $data_comment = $forum->id;
                   echo form_open(base_url('game/forum/comment/').$data_comment);
                   echo validation_errors(); ?>

                   <div class="form-group col-sm-5">
                     <label for="exampleFormControlTextarea1">Komentar</label>
                     <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                   </div>
                 <?php endif; ?>
                 <input type="submit" class="btn btn-primary" value="Kirim">
               </form><br>
               <div class="form-group">
                 <div id="comment">
                   <ol class="comm">

                   </ol>

                 </div>
               </div>
             </div>
         </div>
     </nav>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js" referrerpolicy="no-referrer"></script>
  <script>
      show_comments();

      var pusher = new Pusher('b9c05d2ae974b3456ed0', {
        cluster: 'ap1'
      });

      var channel = pusher.subscribe('my-channel');

      channel.bind('my-event', function(data) {
        show_comments();
      });

      //function show comment
      function show_comments(){
        $.ajax({
          url : "<?php echo base_url('readComment/').$forum->id ?>",
          type : 'GET',
          async : true,
          dataType : 'json',
          success : function(data){

            var id = "<?php echo $this->session->userdata('id') ?>";
            var html = '';
            var i;
            for(i =0; i<data.length; i++){
              var del_url = "<?php echo base_url('delcomment/') ?>" + data[i].id_comment;
              var id_del = "comm"+data[i].id_comment;
              var del = (data[i].id_user == id) ? "<a onclick='delComment("+data[i].id_comment+")' class='del badge badge-danger' href='javascript:;'>hapus komentar</a>" : "";
              var li = (data[i].id_user == id) ? '<li id='+id_del+' class = "self">' : '<li class = "other">';
              html += li + '<p>'+ data[i].username + ' || '+ data[i].time + ' || ' + del + '<br><br>' + data[i].comment + '<br></p></li>';
            }
            $('.comm').html(html);
          }
        });
      }

      function delComment(id_comment){
        var id_del = "#comm"+id_comment;
        $(id_del).hide();
        $.ajax({
          url : "<?php echo base_url('delcomment/') ?>"+id_comment,
          type : 'POST',
          async : true,
        })
      }

  </script>
