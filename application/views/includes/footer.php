

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <a class="_2Zon" href="https://www.facebook.com/saucelabs"  target="_blank"><span class="sr-only">Facebook</span><img src="https://ru.seaicons.com/wp-content/uploads/2016/03/facebook-icon-13.png" style="margin-top:3px" width="30" height="30" alt="facebook icon" title="facebook icon"></a>
            <a class="_2Zon" href="https://twitter.com/saucelabs" target="_blank"><span class="sr-only">Twitter</span>
            <img class="irc_mut" onload="typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)" data-atf="0" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSiQDj3apryQEAiJCLFCs_7klXVQ3Fk3uZGzocpwW-ziDj9Ay0jvQ" width="30" height="30" data-iml="1554400033721" style="margin-top: 0px;">
           </a>
           <a class="_2Zon" href="https://plus.google.com/+SauceLabsInc" target="_blank"><span class="sr-only">Google Plus</span>
            <img data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv8EPzbeydsfhbD0Vsy3gWKeRxUiB4eLFrhWksJZmYgl7oyMCI" jsaction="load:str.tbn" class="rg_ic rg_i" alt="Картинки по запросу Google Plus icon" onload="typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)" style="width: 30px; height: 30px; margin-left: 0px; margin-right: 0px; margin-top: -2px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQv8EPzbeydsfhbD0Vsy3gWKeRxUiB4eLFrhWksJZmYgl7oyMCI">
           </a>
           <a href="">
               <img data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYEW6qIyC1HhWdiYTnGHzzIZkvfcas09o5ZEMN8PjTF4SxD5H_pw" jsaction="load:str.tbn" class="rg_ic rg_i" alt="Картинки по запросу instagram icon" onload="typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)" style="width: 30px; height: 30px; margin-left: 0px; margin-right: 0px; margin-top: 0px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYEW6qIyC1HhWdiYTnGHzzIZkvfcas09o5ZEMN8PjTF4SxD5H_pw">
           </a>
           </div>

        <strong>Copyright &copy; 2019<a href="<?php echo base_url(); ?>">Demi</a>.</strong> All rights reserved.
    </footer>
    
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/validation.js" type="text/javascript"></script>
<!--     <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/jQueryUI/jquery-ui.js" type="text/javascript"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script type="text/javascript">
        var windowURL = window.location.href;
        pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
        var x= $('a[href="'+pageURL+'"]');
            x.addClass('active');
            x.parent().addClass('active');
        var y= $('a[href="'+windowURL+'"]');
            y.addClass('active');
            y.parent().addClass('active');
    </script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
  </body>
</html>