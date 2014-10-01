<?php global $posts ?>
<?php foreach ($posts as $post) { ?>
          <!-- post -->
          <div class="ui full page column grid">
            <div class="ui column">
              <div class="ui stacked segment">

                <div class="ui two column grid">
                  <div class="ui column" style="max-width:108px;">
                    <div class="ui circular segment" style="padding:5px;">
                      <img class="ui circular image" src="perfil/<?php echo $usuario_id ?>" alt="" style="width:64px; height:64px;" />
                    </div>
                  </div>
                  <div class="ui column" style="margin:0px;">
                    <div>
                      <p><big><strong><?php echo $nombre ?> <?php echo $apellido ?> (<?php echo $usuario ?>)</strong></big>
                      <br><small><?php echo $fecha ?></small></p>
                    </div>
                  </div>
                </div>
                <p><?php echo $texto ?></p>
              </div>
            </div>
          </div>
<?php } ?>