<!-- register -->
        <div class="ui basic segment">
          <form class="ui form segment" id="form-registro" action="" method="post" style="max-width:850px; min-width:450px; margin:45px auto;">
            <h1>Crear tu cuenta</h1>
            <div class="two fields">
              <div class="field">
                <label>Nombre</label>
                <input name="nombre" placeholder="Nombre" type="text">
              </div>
              <div class="field">
                <label>Apellido</label>
                <input name="apellido" placeholder="Apellido" type="text">
              </div>
            </div>
            <div class="field">
              <label>Genero</label>
              <div class="ui fluid selection dropdown">
                <div class="text">Seleccionar</div>
                <i class="dropdown icon"></i>
                <input name="genero" type="hidden">
                <div class="menu">
                  <div class="item" data-value="0">Prefiero no informarlo</div>
                  <div class="item" data-value="1">Hombre</div>
                  <div class="item" data-value="2">Mujer</div>
                </div>
              </div>
            </div>
            <div class="field">
              <label>Nombre de usuario</label>
              <input name="usuario" placeholder="Nombre de usuario" type="text">
            </div>
            <div class="field">
              <label>Email</label>
              <input name="email" placeholder="Email" type="text">
            </div>
            <div class="field">
              <label>Contrase&ntilde;a</label>
              <input name="clave" type="password" autocomplete="off" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
            </div>
            <div class="field">
              <label>Repetir Contrase&ntilde;a</label>
              <input name="repetirclave" type="password" autocomplete="off" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
            </div>
            <div class="inline field">
              <div class="ui checkbox">
                <input name="terminos" type="checkbox">
                <label>Estoy de acuerdo con los terminos y condiciones</label>
              </div>
            </div>
            <br>
            <div class="ui teal submit button">Crear cuenta</div>
          </form>
        </div>