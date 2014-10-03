<!-- vista login -->
<div class="ui segment" style="width:450px; margin:65px auto;">
  <h3 style="color:#888;">Entrar en FriendBook</h3>
  <form class="ui form" id="form-login" action="/login" method="post">
    <div class="field">
      <label>Usuario</label>
      <div class="ui left labeled icon input">
        <input id="usuario" name="usuario" type="text" placeholder="Usuario">
        <i class="user icon"></i>
        <div class="ui corner label">
          <i class="icon asterisk"></i>
        </div>
      </div>
    </div>
    <div class="field">
      <label>Contraseña</label>
      <div class="ui left labeled icon input">
        <input id="contrasenia" name="contrasenia" type="password" autocomplete="off" placeholder="Contraseña" style="background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
        <i class="lock icon"></i>
        <div class="ui corner label">
          <i class="icon asterisk"></i>
        </div>
      </div>
    </div>
    <div class="ui teal labeled icon submit button"><i class="sign in icon"></i> Ingresar</div>
    <a class="ui button floated right" href="/registro">Crear una cuenta</a>
  </form>
</div>