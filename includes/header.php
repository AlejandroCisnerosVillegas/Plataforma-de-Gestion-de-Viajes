<?php if($_SESSION['login']) {?>
<div class="top-header">
    <div class="container">
        <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
            <li class="hm"><a style="font-size: 18px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'"><i class="fa fa-tasks"></i></a></li>
            <li class="prnt"><a href="profile.php" style="font-size: 14px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">Perfil</a></li>
            <li class="prnt"><a href="change-password.php" style="font-size: 14px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">Contraseña</a></li>
            <li class="prnt"><a href="tour-history.php" style="font-size: 14px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">Tours Registrados</a></li>
            <li class="prnt"><a href="issuetickets.php" style="font-size: 14px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">Asesoramiento</a></li>
        </ul>
        <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
            <li class="sigi"><a href="logout.php" style="font-size: 14px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">Cerrar Sesión</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<?php } else {?>
<div class="top-header">
    <div class="container">
        <ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
			<li class="hm"><a><i class="fa fa-bar-chart" style="font-size: 24px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'"></i></a></li>
            <li class="hm"><a href="admin/index.php" style="font-size: 17px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">Acceso Avanzado</a></li>
        </ul>
        <ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">                
			<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal" style="font-size: 17px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">Registrarse</a></li>
            <li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4" style="font-size: 17px; color: #FFFFFF;" onmouseover="this.style.color='#8D9FA0'" onmouseout="this.style.color='#FFFFFF'">/ Iniciar Sesión</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<?php }?>
<div class="header">
    <div class="container">
        <div class="logo wow fadeInDown animated" data-wow-delay=".5s">
            <a href="index.php">Plataforma de <span>Gestión de Viajes</span></a>    
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
    <div class="container">
    <div class="navigation">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Barra de Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                    <nav class="cl-effect-1">
                        <ul class="nav navbar-nav">
                            <li><a href="index.php" style="font-size: 16px;"><strong>Inicio</strong></a></li>
                            <li><a href="page.php?type=Nosotros" style="font-size: 16px;"><strong>Sobre Nosotros</strong></a></li>
                            <li><a href="package-list.php" style="font-size: 16px;"><strong>Tours Vacacionales</strong></a></li>
                            <li><a href="page.php?type=Contactanos" style="font-size: 16px;"><strong>Contáctanos</strong></a></li>
                            <?php if($_SESSION['login']) {?>
                            <li><a href="#" data-toggle="modal" data-target="#myModal3" style="font-size: 16px;"><strong>Asesoramiento Técnico</strong></a></li>
                            <?php } else { ?>
                            <li><a href="enquiry.php" style="font-size: 16px;"><strong>Consulta</strong></a></li>
                            <?php } ?>
                            <div class="clearfix"></div>
                        </ul>
                    </nav>
                </div>  
            </nav>
        </div>
        <div class="clearfix"></div>
    </div>
</div>