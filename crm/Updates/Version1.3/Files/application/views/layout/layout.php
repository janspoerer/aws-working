<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php if(isset($page_title)) : ?><?php echo $page_title ?> - <?php endif; ?><?php echo $this->settings->info->site_name ?></title>         
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap -->
        <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="<?php echo base_url();?>bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

         <!-- Styles -->
        <link href="<?php echo base_url();?>styles/deepblue.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>styles/elements.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>styles/responsive.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,500,550,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />

        <!-- SCRIPTS -->
        <script type="text/javascript">
        var global_base_url = "<?php echo site_url('/') ?>";
        var global_hash = "<?php echo $this->security->get_csrf_hash() ?>";
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.css"/>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.12/datatables.min.js"></script>

        
        <!-- CODE INCLUDES -->
        <?php echo $cssincludes ?> 

        <!-- Favicon: http://realfavicongenerator.net -->
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>images/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>images/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="<?php echo base_url() ?>images/favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="<?php echo base_url() ?>images/favicon/manifest.json">
        <link rel="mask-icon" href="<?php echo base_url() ?>images/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">




        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        

    </head>
    <body>

    <nav class="navbar navbar-inverse navbar-header2">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php if($this->settings->info->logo_option) : ?>
          <a class="navbar-brand-two" href="<?php echo site_url() ?>" title="<?php echo $this->settings->info->site_name ?>"><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->settings->info->site_logo ?>" width="123" height="32"></a>
        <?php else : ?>
          <a class="navbar-brand" href="<?php echo site_url() ?>" title="<?php echo $this->settings->info->site_name ?>"><?php echo $this->settings->info->site_name ?></a>
        <?php endif; ?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php if($this->user->loggedin) : ?>
            <?php if($this->user->info->active_projectid > 0) : ?>
              <li class="user_bit">
              <img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->user->info->project_image ?>" class="user_avatar"> <a href="#" onclick="load_projects()" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="project-menu-drop"><?php echo $this->user->info->project_name ?></a>

          <ul class="dropdown-menu" aria-labelledby="project-menu-drop">
            <li>
            <div class="notification-box-title">
            <?php echo lang("ctn_673") ?>
            </div>
            <div id="projects-scroll">
              <div id="loading_spinner_projects">
                <span class="glyphicon glyphicon-refresh" id="ajspinner_projects"></span>
              </div>
            </div>
            <div class="project-box-footer">
            <a href="<?php echo site_url("projects/make_active/0") ?>"><?php echo lang("ctn_674") ?></a>
            </div>
          </li>
          </ul>

              </li>
            <?php endif; ?>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "time_worker", "time_manage"), $this->user)) : ?>
            <li><a href="#" data-target="#" onclick="load_timers()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="timer-menu-drop"><span class="glyphicon glyphicon-time notification-icon"></span><span class="badge timer-badge small-text" id="timer-count" <?php if($this->user->info->timer_count <= 0) : ?>style="display: none;"<?php endif; ?>><?php echo number_format($this->user->info->timer_count) ?></span></a>
        
            <ul class="dropdown-menu" aria-labelledby="time-menu-drop" id="time-menu-drop">
            <li>
            <div class="notification-box-title">
            <?php echo lang("ctn_675") ?> <input type="button" class="btn btn-primary btn-xs" value="<?php echo lang("ctn_676") ?>" id="start_timer_button" onclick="start_timer()"> 
            </div>
            <div id="timer-scroll">
              <div id="loading_spinner_timer">
                <span class="glyphicon glyphicon-refresh" id="ajspinner_timer"></span>
              </div>
            </div>
            <div class="notification-box-footer">
            <a href="<?php echo site_url("time") ?>"><?php echo lang("ctn_677") ?></a>
            </div>
          </li>
          </ul>
          </li>
        <?php endif; ?>
            <li><a href="#" data-target="#" onclick="load_notifications()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="noti-menu-drop"><span class="glyphicon glyphicon-bell notification-icon"></span><?php if($this->user->info->noti_count > 0) : ?><span class="badge notification-badge small-text"><?php echo $this->user->info->noti_count ?></span><?php endif; ?></a>
        
            <ul class="dropdown-menu" aria-labelledby="noti-menu-drop">
            <li>
            <div class="notification-box-title">
            <?php echo lang("ctn_678") ?> <?php if($this->user->info->noti_count > 0) : ?><span class="badge click" id="noti-click-unread" onclick="load_notifications_unread()"><?php echo $this->user->info->noti_count ?></span><?php endif; ?>
            </div>
            <div id="notifications-scroll">
              <div id="loading_spinner_notification">
                <span class="glyphicon glyphicon-refresh" id="ajspinner_notification"></span>
              </div>
            </div>
            <div class="notification-box-footer">
            <a href="<?php echo site_url("home/notifications") ?>"><?php echo lang("ctn_679") ?></a>
            </div>
          </li>
          </ul>
          </li>
            <li><a href="#" data-target="#" onclick="load_emails()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="email-menu-drop"><span class="glyphicon glyphicon-envelope notification-icon"></span><?php if($this->user->info->email_count > 0) : ?><span class="badge notification-badge small-text"><?php echo $this->user->info->email_count ?></span><?php endif; ?></a>

            <ul class="dropdown-menu" aria-labelledby="email-menu-drop">
            <li>
              <div class="notification-box-title">
                <?php echo lang("ctn_680") ?> <?php if($this->user->info->email_count > 0) : ?><span class="badge"><?php echo $this->user->info->email_count ?></span><?php endif; ?>
                </div>
                <div id="email-scroll">
                  <div id="loading_spinner_email">
                    <span class="glyphicon glyphicon-refresh" id="ajspinner_email"></span>
                  </div>
                </div>
                <div class="notification-box-footer">
                <a href="<?php echo site_url("mail") ?>"><?php echo lang("ctn_681") ?></a>
              </div>
            </li>
            </ul>

            </li>
            <li class="user_bit"><img src="<?php echo base_url() ?><?php echo $this->settings->info->upload_path_relative ?>/<?php echo $this->user->info->avatar ?>" class="user_avatar"> <a href="<?php echo site_url("user_settings") ?>"><?php echo $this->user->info->username ?></a></li>
            <li><a href="<?php echo site_url("login/logout/" . $this->security->get_csrf_hash()) ?>"><?php echo lang("ctn_149") ?></a></li>
          <?php else : ?>
          <li><a href="<?php echo site_url("login") ?>"><?php echo lang("ctn_150") ?></a></li>
            <li><a href="<?php echo site_url("register") ?>"><?php echo lang("ctn_151") ?></a></li>
          <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="sidebar">
      <?php if(isset($sidebar)) : ?>
          <?php echo $sidebar ?>
        <?php endif; ?>
          <ul class="newnav nav nav-sidebar">
           <?php if($this->user->loggedin && isset($this->user->info->user_role_id) && 
           ($this->user->info->admin || $this->user->info->admin_settings || $this->user->info->admin_members || $this->user->info->admin_payment)

           ) : ?>
              <li id="admin_sb">
                <a data-toggle="collapse" data-parent="#admin_sb" href="#admin_sb_c" class="collapsed <?php if(isset($activeLink['admin'])) echo "active" ?>" >
                  <span class="glyphicon glyphicon-wrench sidebar-icon sidebar-icon-red"></span> <?php echo lang("ctn_157") ?>
                  <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['admin'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                </a>
                <div id="admin_sb_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['admin'])) echo "in" ?>">
                  <ul class="inner-sidebar-links">
                   <li class="<?php if(isset($activeLink['admin']['general'])) echo "active" ?>"><a href="<?php echo site_url("admin") ?>"> <?php echo lang("ctn_682") ?></a></li>
                    <?php if($this->user->info->admin || $this->user->info->admin_settings) : ?>
                      <li class="<?php if(isset($activeLink['admin']['settings'])) echo "active" ?>"><a href="<?php echo site_url("admin/settings") ?>"> <?php echo lang("ctn_158") ?></a></li>
                      <li class="<?php if(isset($activeLink['admin']['social_settings'])) echo "active" ?>"><a href="<?php echo site_url("admin/social_settings") ?>"> <?php echo lang("ctn_159") ?></a></li>
                      <li class="<?php if(isset($activeLink['admin']['calendar_settings'])) echo "active" ?>"><a href="<?php echo site_url("admin/calendar_settings") ?>"> <?php echo lang("ctn_683") ?></a></li>
                      <li class="<?php if(isset($activeLink['admin']['section'])) echo "active" ?>"><a href="<?php echo site_url("admin/section_settings") ?>"> <?php echo lang("ctn_684") ?></a></li>
                      <li class="<?php if(isset($activeLink['admin']['date'])) echo "active" ?>"><a href="<?php echo site_url("admin/date_settings") ?>"> <?php echo lang("ctn_1134") ?></a></li>
                    <?php endif; ?>
                    <?php if($this->user->info->admin || $this->user->info->admin_members) : ?>
                    <li class="<?php if(isset($activeLink['admin']['members'])) echo "active" ?>"><a href="<?php echo site_url("admin/members") ?>"> <?php echo lang("ctn_160") ?></a></li>
                    <?php endif; ?>
                    <?php if($this->user->info->admin) : ?>
                    <li class="<?php if(isset($activeLink['admin']['user_roles'])) echo "active" ?>"><a href="<?php echo site_url("admin/user_roles") ?>"> <?php echo lang("ctn_316") ?></a></li>
                    <?php endif; ?>
                    <?php if($this->user->info->admin || $this->user->info->admin_members) : ?>
                    <li class="<?php if(isset($activeLink['admin']['user_groups'])) echo "active" ?>"><a href="<?php echo site_url("admin/user_groups") ?>"> <?php echo lang("ctn_161") ?></a></li>
                    <li class="<?php if(isset($activeLink['admin']['ipblock'])) echo "active" ?>"><a href="<?php echo site_url("admin/ipblock") ?>"> <?php echo lang("ctn_162") ?></a></li>
                    <?php endif; ?>
                    <?php if($this->user->info->admin) : ?>
                      <li class="<?php if(isset($activeLink['admin']['tickets'])) echo "active" ?>"><a href="<?php echo site_url("admin/tickets") ?>"> <?php echo lang("ctn_685") ?></a></li>
                      <li class="<?php if(isset($activeLink['admin']['email_templates'])) echo "active" ?>"><a href="<?php echo site_url("admin/email_templates") ?>"> <?php echo lang("ctn_163") ?></a></li>
                    <?php endif; ?>
                    <?php if($this->user->info->admin || $this->user->info->admin_members) : ?>
                      <li class="<?php if(isset($activeLink['admin']['email_members'])) echo "active" ?>"><a href="<?php echo site_url("admin/email_members") ?>"> <?php echo lang("ctn_164") ?></a></li>
                    <?php endif; ?>
                    <?php if($this->user->info->admin || $this->user->info->admin_payment) : ?>
                    <li class="<?php if(isset($activeLink['admin']['payment_currency'])) echo "active" ?>"><a href="<?php echo site_url("admin/currencies") ?>"> <?php echo lang("ctn_686") ?></a></li>
                    <li class="<?php if(isset($activeLink['admin']['payment_logs'])) echo "active" ?>"><a href="<?php echo site_url("admin/payment_logs") ?>"><?php echo lang("ctn_288") ?></a></li>
                    <li class="<?php if(isset($activeLink['admin']['payment_invoice'])) echo "active" ?>"><a href="<?php echo site_url("admin/invoice") ?>"> <?php echo lang("ctn_687") ?></a></li>
                    <?php endif; ?>
                    <?php if($this->user->info->admin) : ?>
                      <li class="<?php if(isset($activeLink['admin']['tools'])) echo "active" ?>"><a href="<?php echo site_url("admin/tools") ?>"> Tools</a></li>
                    <?php endif; ?>
                  </ul>
                </div>
              </li>
            <?php endif; ?>
            <li class="<?php if(isset($activeLink['home']['general'])) echo "active" ?>"><a href="<?php echo site_url() ?>"><span class="glyphicon glyphicon-home sidebar-icon sidebar-icon-blue"></span> <?php echo lang("ctn_688") ?> <span class="sr-only">(current)</span></a></li>

            <li id="projects_links">
                <a data-toggle="collapse" data-parent="#projects_links" href="#projects_links_c" class="collapsed <?php if(isset($activeLink['projects'])) echo "active" ?>" >
                  <span class="glyphicon glyphicon-folder-open sidebar-icon sidebar-icon-green"></span> <?php echo lang("ctn_689") ?>
                  <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['projects'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                </a>
                <div id="projects_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['projects'])) echo "in" ?>">
                  <ul class="inner-sidebar-links">
                    <li class="<?php if(isset($activeLink['projects']['general'])) echo "active" ?>"><a href="<?php echo site_url("projects") ?>"> <?php echo lang("ctn_690") ?></a></li>
                    <?php if($this->common->has_permissions(array("admin", "project_admin"), $this->user)) : ?>
                      <li class="<?php if(isset($activeLink['projects']['all'])) echo "active" ?>"><a href="<?php echo site_url("projects/all") ?>"> <?php echo lang("ctn_691") ?></a></li>
                      <li class="<?php if(isset($activeLink['projects']['cats'])) echo "active" ?>"><a href="<?php echo site_url("projects/cats") ?>"> <?php echo lang("ctn_692") ?></a></li>
                    <?php endif; ?>
                  </ul>
                </div>
            </li>
            <?php if($this->settings->info->enable_calendar && $this->common->has_permissions(array("admin", "project_admin", "calendar_worker", "calendar_manage"), $this->user)) : ?>
              <li id="calendar_links">
                  <a data-toggle="collapse" data-parent="#calendar_links" href="#calendar_links_c" class="collapsed <?php if(isset($activeLink['calendar'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-calendar sidebar-icon sidebar-icon-orange"></span> <?php echo lang("ctn_693") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['calendar'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="calendar_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['calendar'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['calendar']['general'])) echo "active" ?>"><a href="<?php echo site_url("calendar") ?>"> <?php echo lang("ctn_694") ?></a></li>
                       <?php if($this->common->has_permissions(array("admin", "project_admin", "calendar_manage"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['calendar']['all'])) echo "active" ?>"><a href="<?php echo site_url("calendar/all") ?>"> <?php echo lang("ctn_695") ?></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_tasks && $this->common->has_permissions(array("admin", "project_admin", "task_worker", "task_manage", "task_client"), $this->user)) : ?>
              <li id="task_links">
                  <a data-toggle="collapse" data-parent="#task_links" href="#task_links_c" class="collapsed <?php if(isset($activeLink['task'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-tasks sidebar-icon sidebar-icon-pink"></span> <?php echo lang("ctn_696") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['task'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="task_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['task'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                    <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage", "task_worker"), $this->user)) : ?>
                      <li class="<?php if(isset($activeLink['task']['general'])) echo "active" ?>"><a href="<?php echo site_url("tasks") ?>"> <?php echo lang("ctn_697") ?></a></li>
                      <li class="<?php if(isset($activeLink['task']['your'])) echo "active" ?>"><a href="<?php echo site_url("tasks/assigned") ?>"> <?php echo lang("ctn_698") ?></a></li>
                    <?php endif; ?>
                      <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['task']['all'])) echo "active" ?>"><a href="<?php echo site_url("tasks/all") ?>"> <?php echo lang("ctn_699") ?></a></li>
                      <?php endif; ?>
                      <?php if($this->common->has_permissions(array("task_client"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['task']['client'])) echo "active" ?>"><a href="<?php echo site_url("tasks/client") ?>"> Task Progress</a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_files && $this->common->has_permissions(array("admin", "project_admin", "file_worker", "file_manage"), $this->user)) : ?>
              <li id="file_links">
                  <a data-toggle="collapse" data-parent="#file_links" href="#file_links_c" class="collapsed <?php if(isset($activeLink['file'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-file sidebar-icon sidebar-icon-brown"></span> <?php echo lang("ctn_700") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['file'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="file_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['file'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['file']['general'])) echo "active" ?>"><a href="<?php echo site_url("files") ?>"> <?php echo lang("ctn_701") ?></a></li>
                      <?php if($this->common->has_permissions(array("admin", "project_admin", "file_manage"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['file']['all'])) echo "active" ?>"><a href="<?php echo site_url("files/all") ?>"> <?php echo lang("ctn_702") ?></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_team && $this->common->has_permissions(array("admin", "project_admin", "team_worker", "team_manage"), $this->user)) : ?>
              <li id="team_links">
                  <a data-toggle="collapse" data-parent="#team_links" href="#team_links_c" class="collapsed <?php if(isset($activeLink['team'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-user sidebar-icon sidebar-icon-red"></span> <?php echo lang("ctn_703") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['team'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="team_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['team'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['team']['general'])) echo "active" ?>"><a href="<?php echo site_url("team") ?>"> <?php echo lang("ctn_704") ?></a></li>
                      <?php if($this->common->has_permissions(array("admin", "project_admin", "team_manage"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['team']['all'])) echo "active" ?>"><a href="<?php echo site_url("team/all") ?>"> <?php echo lang("ctn_705") ?></a></li>
                        <li class="<?php if(isset($activeLink['team']['roles'])) echo "active" ?>"><a href="<?php echo site_url("team/roles") ?>"> <?php echo lang("ctn_706") ?></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_time && $this->common->has_permissions(array("admin", "project_admin", "time_worker", "time_manage"), $this->user)) : ?>
              <li id="time_links">
                  <a data-toggle="collapse" data-parent="#time_links" href="#time_links_c" class="collapsed <?php if(isset($activeLink['time'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-time sidebar-icon sidebar-icon-blue"></span> <?php echo lang("ctn_707") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['time'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="time_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['time'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['time']['general'])) echo "active" ?>"><a href="<?php echo site_url("time") ?>"> <?php echo lang("ctn_708") ?></a></li>
                      <?php if($this->common->has_permissions(array("admin", "project_admin", "time_manage"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['time']['all'])) echo "active" ?>"><a href="<?php echo site_url("time/all") ?>"> <?php echo lang("ctn_709") ?></a></li>
                      <?php endif; ?>
                      <li class="<?php if(isset($activeLink['time']['stats'])) echo "active" ?>"><a href="<?php echo site_url("time/stats") ?>"> <?php echo lang("ctn_710") ?></a></li>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_tickets && $this->common->has_permissions(array("admin", "project_admin", "ticket_worker", "ticket_manage", "ticket_client"), $this->user)) : ?>
              <li id="tickets_links">
                  <a data-toggle="collapse" data-parent="#tickets_links" href="#tickets_links_c" class="collapsed <?php if(isset($activeLink['tickets'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-send sidebar-icon sidebar-icon-green"></span> <?php echo lang("ctn_711") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['tickets'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="tickets_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['tickets'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                    <?php if($this->common->has_permissions(array("admin", "project_admin", "ticket_manage", "ticket_worker"), $this->user)) : ?>
                      <li class="<?php if(isset($activeLink['tickets']['general'])) echo "active" ?>"><a href="<?php echo site_url("tickets") ?>"> <?php echo lang("ctn_711") ?></a></li>
                      <li class="<?php if(isset($activeLink['tickets']['your'])) echo "active" ?>"><a href="<?php echo site_url("tickets/your") ?>"> <?php echo lang("ctn_712") ?></a></li>
                    <?php endif; ?>
                       <?php if($this->common->has_permissions(array("admin", "project_admin", "ticket_manage"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['tickets']['departments'])) echo "active" ?>"><a href="<?php echo site_url("tickets/departments") ?>"> <?php echo lang("ctn_713") ?></a></li>
                        <li class="<?php if(isset($activeLink['tickets']['custom'])) echo "active" ?>"><a href="<?php echo site_url("tickets/custom") ?>"> <?php echo lang("ctn_714") ?></a></li>
                      <?php endif; ?>
                      <?php if($this->common->has_permissions(array("admin", "project_admin", "ticket_manage", "ticket_client"), $this->user)) : ?>
                        <li class="<?php if(isset($activeLink['tickets']['client'])) echo "active" ?>"><a href="<?php echo site_url("tickets/client") ?>"> <?php echo lang("ctn_715") ?></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_finance && $this->common->has_permissions(array("admin", "project_admin", "finance_worker", "finance_manage"), $this->user)) : ?>
              <li id="finance_links">
                  <a data-toggle="collapse" data-parent="#finance_links" href="#finance_links_c" class="collapsed <?php if(isset($activeLink['finance'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-piggy-bank sidebar-icon sidebar-icon-orange"></span> <?php echo lang("ctn_716") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['finance'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="finance_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['finance'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['finance']['general'])) echo "active" ?>"><a href="<?php echo site_url("finance") ?>"> <?php echo lang("ctn_717") ?></a></li>
                       <?php if($this->common->has_permissions(array("admin", "project_admin", "finance_manage"), $this->user)) : ?>
                      <li class="<?php if(isset($activeLink['finance']['all'])) echo "active" ?>"><a href="<?php echo site_url("finance/all") ?>"> <?php echo lang("ctn_718") ?></a></li>
                        <li class="<?php if(isset($activeLink['finance']['cats'])) echo "active" ?>"><a href="<?php echo site_url("finance/categories") ?>"> <?php echo lang("ctn_719") ?></a></li>
                      <?php endif; ?>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_invoices && $this->common->has_permissions(array("admin", "project_admin", "invoice_manage", "invoice_client"), $this->user)) : ?>
              <li id="invoice_links">
                  <a data-toggle="collapse" data-parent="#invoice_links" href="#invoice_links_c" class="collapsed <?php if(isset($activeLink['invoice'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-credit-card sidebar-icon sidebar-icon-pink"></span> <?php echo lang("ctn_720") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['invoice'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="invoice_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['invoice'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                    <?php if($this->common->has_permissions(array("admin", "project_admin", "invoice_manage"), $this->user)) : ?>
                      <li class="<?php if(isset($activeLink['invoice']['general'])) echo "active" ?>"><a href="<?php echo site_url("invoices") ?>"> <?php echo lang("ctn_721") ?></a></li>
                      <li class="<?php if(isset($activeLink['invoice']['reoccuring'])) echo "active" ?>"><a href="<?php echo site_url("invoices/reoccuring") ?>"> <?php echo lang("ctn_722") ?></a></li>
                      <li class="<?php if(isset($activeLink['invoice']['templates'])) echo "active" ?>"><a href="<?php echo site_url("invoices/templates") ?>"> <?php echo lang("ctn_723") ?></a></li>
                    <?php endif; ?>
                      <li class="<?php if(isset($activeLink['invoice']['client'])) echo "active" ?>"><a href="<?php echo site_url("invoices/client") ?>"> <?php echo lang("ctn_724") ?></a></li>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_notes && $this->common->has_permissions(array("admin", "project_admin", "notes_manage", "notes_worker"), $this->user)) : ?>
              <li id="notes_links">
                  <a data-toggle="collapse" data-parent="#notes_links" href="#notes_links_c" class="collapsed <?php if(isset($activeLink['notes'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-pencil sidebar-icon sidebar-icon-brown"></span> <?php echo lang("ctn_725") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['notes'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="notes_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['notes'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                    <?php if($this->common->has_permissions(array("admin", "project_admin", "notes_manage"), $this->user)) : ?>
                      <li class="<?php if(isset($activeLink['notes']['general'])) echo "active" ?>"><a href="<?php echo site_url("notes") ?>"> <?php echo lang("ctn_726") ?></a></li>
                    <?php endif; ?>
                      <li class="<?php if(isset($activeLink['notes']['your'])) echo "active" ?>"><a href="<?php echo site_url("notes/your") ?>"> <?php echo lang("ctn_727") ?></a></li>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_quotes && $this->common->has_permissions(array("admin", "project_admin", "quote_manage"), $this->user)) : ?>
              <li id="quote_links">
                  <a data-toggle="collapse" data-parent="#quote_links" href="#quote_links_c" class="collapsed <?php if(isset($activeLink['quote'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-blackboard sidebar-icon sidebar-icon-red"></span> <?php echo lang("ctn_728") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['quote'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="quote_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['quote'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['quote']['general'])) echo "active" ?>"><a href="<?php echo site_url("quotes") ?>"> <?php echo lang("ctn_728") ?></a></li>
                      <li class="<?php if(isset($activeLink['quote']['forms'])) echo "active" ?>"><a href="<?php echo site_url("quotes/forms") ?>"> <?php echo lang("ctn_729") ?></a></li>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_services && $this->common->has_permissions(array("admin", "project_admin", "services_manage"), $this->user)) : ?>
              <li id="services_links">
                  <a data-toggle="collapse" data-parent="#services_links" href="#services_links_c" class="collapsed <?php if(isset($activeLink['services'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-th-list sidebar-icon sidebar-icon-blue"></span> <?php echo lang("ctn_1215") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['services'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="services_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['services'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['services']['general'])) echo "active" ?>"><a href="<?php echo site_url("services") ?>"> <?php echo lang("ctn_1215") ?></a></li>
                      <li class="<?php if(isset($activeLink['services']['orders'])) echo "active" ?>"><a href="<?php echo site_url("services/orders") ?>"> <?php echo lang("ctn_1216") ?></a></li>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>
            <?php if($this->settings->info->enable_reports && $this->common->has_permissions(array("admin", "project_admin", "reports_manage", "reports_worker"), $this->user)) : ?>
              <li id="quote_links">
                  <a data-toggle="collapse" data-parent="#reports_links" href="#reports_links_c" class="collapsed <?php if(isset($activeLink['reports'])) echo "active" ?>" >
                    <span class="glyphicon glyphicon-list-alt sidebar-icon sidebar-icon-green"></span> <?php echo lang("ctn_1141") ?>
                    <span class="plus-sidebar"><span class="glyphicon <?php if(isset($activeLink['reports'])) : ?>glyphicon-menu-down<?php else : ?>glyphicon-menu-right<?php endif; ?>"></span></span>
                  </a>
                  <div id="reports_links_c" class="panel-collapse collapse sidebar-links-inner <?php if(isset($activeLink['reports'])) echo "in" ?>">
                    <ul class="inner-sidebar-links">
                      <li class="<?php if(isset($activeLink['reports']['general'])) echo "active" ?>"><a href="<?php echo site_url("reports") ?>"> <?php echo lang("ctn_1146") ?></a></li>
                      <li class="<?php if(isset($activeLink['reports']['time'])) echo "active" ?>"><a href="<?php echo site_url("reports/time") ?>"> <?php echo lang("ctn_1147") ?></a></li>
                      <li class="<?php if(isset($activeLink['reports']['finance'])) echo "active" ?>"><a href="<?php echo site_url("reports/finance") ?>"> <?php echo lang("ctn_1148") ?></a></li>
                      <li class="<?php if(isset($activeLink['reports']['invoices'])) echo "active" ?>"><a href="<?php echo site_url("reports/invoices") ?>"> <?php echo lang("ctn_1149") ?></a></li>
                    </ul>
                  </div>
              </li>
            <?php endif; ?>

            <li class="<?php if(isset($activeLink['settings']['general'])) echo "active" ?>"><a href="<?php echo site_url("user_settings") ?>"><span class="glyphicon glyphicon-cog sidebar-icon sidebar-icon-orange"></span> <?php echo lang("ctn_156") ?></a></li>
          
          
          </ul>
    </div>

    <div id="main-content">
    <div id="responsive-menu-links">
          <select name='link' OnChange="window.location.href=$(this).val();" class="form-control">
          <option value='<?php echo site_url() ?>'><?php echo lang("ctn_154") ?></option>
          <option value='<?php echo site_url("members") ?>'><?php echo lang("ctn_155") ?></option>
          <option value='<?php echo site_url("user_settings") ?>'><?php echo lang("ctn_156") ?></option>
          <?php if($this->user->loggedin && isset($this->user->info->user_role_id) && 
           ($this->user->info->admin || $this->user->info->admin_settings || $this->user->info->admin_members || $this->user->info->admin_payment)

           ) : ?>
           <?php if($this->user->info->admin || $this->user->info->admin_settings) : ?>
            <option value='<?php echo site_url("admin/settings") ?>'><?php echo lang("ctn_158") ?></option>
            <option value='<?php echo site_url("admin/social_settings") ?>'><?php echo lang("ctn_159") ?></option>
            <option value='<?php echo site_url("admin/calendar_settings") ?>'><?php echo lang("ctn_683") ?></option>
            <option value='<?php echo site_url("admin/section_settings") ?>'><?php echo lang("ctn_684") ?></option>
            <option value='<?php echo site_url("admin/date_settings") ?>'><?php echo lang("ctn_1134") ?></option>
            <?php endif; ?>
            <?php if($this->user->info->admin || $this->user->info->admin_members) : ?>
            <option value='<?php echo site_url("admin/members") ?>'><?php echo lang("ctn_160") ?></option>
            <?php endif; ?>
            <?php if($this->user->info->admin) : ?>
            <option value='<?php echo site_url("admin/user_roles") ?>'><?php echo lang("ctn_316") ?></option>
            <?php endif; ?>
            <?php if($this->user->info->admin || $this->user->info->admin_members) : ?>
            <option value='<?php echo site_url("admin/user_groups") ?>'><?php echo lang("ctn_161") ?></option>
            <option value='<?php echo site_url("admin/ipblock") ?>'><?php echo lang("ctn_162") ?></option>
            <?php endif; ?>
            <?php if($this->user->info->admin) : ?>
            <option value='<?php echo site_url("admin/tickets") ?>'><?php echo lang("ctn_685") ?></option>
            <option value='<?php echo site_url("admin/email_templates") ?>'><?php echo lang("ctn_163") ?></option>
            <?php endif; ?>
            <?php if($this->user->info->admin || $this->user->info->admin_members) : ?>
            <option value='<?php echo site_url("admin/email_members") ?>'><?php echo lang("ctn_164") ?></option>
            <?php endif; ?>
            <?php if($this->user->info->admin || $this->user->info->admin_payment) : ?>
            <option value='<?php echo site_url("admin/currencies") ?>'><?php echo lang("ctn_686") ?></option>
            <option value='<?php echo site_url("admin/payment_logs") ?>'><?php echo lang("ctn_288") ?></option>
            <option value='<?php echo site_url("admin/invoice") ?>'><?php echo lang("ctn_687") ?></option>
            <?php endif; ?>
          <?php endif; ?>
          <option value='<?php echo site_url("projects") ?>'><?php echo lang("ctn_689") ?></option>
          <?php if($this->common->has_permissions(array("admin", "project_admin"), $this->user)) : ?>
            <option value='<?php echo site_url("projects/all") ?>'><?php echo lang("ctn_691") ?></option>
            <option value='<?php echo site_url("projects/cats") ?>'><?php echo lang("ctn_730") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_calendar && $this->common->has_permissions(array("admin", "project_admin", "calendar_worker", "calendar_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("calendar") ?>'><?php echo lang("ctn_694") ?></option>
            <option value='<?php echo site_url("calendar/all") ?>'><?php echo lang("ctn_695") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_tasks && $this->common->has_permissions(array("admin", "project_admin", "task_worker", "task_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("tasks") ?>'><?php echo lang("ctn_697") ?></option>
            <option value='<?php echo site_url("tasks/assigned") ?>'><?php echo lang("ctn_698") ?></option>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "task_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("tasks/all") ?>'><?php echo lang("ctn_699") ?></option>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($this->common->has_permissions(array("task_client"), $this->user)) : ?>
            <option value='<?php echo site_url("tasks/client") ?>'>Task Progress</option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_files && $this->common->has_permissions(array("admin", "project_admin", "file_worker", "file_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("files") ?>'><?php echo lang("ctn_701") ?></option>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "file_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("files/all") ?>'><?php echo lang("ctn_702") ?></option>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($this->settings->info->enable_team && $this->common->has_permissions(array("admin", "project_admin", "team_worker", "team_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("team") ?>'><?php echo lang("ctn_704") ?></option>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "team_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("team/all") ?>'><?php echo lang("ctn_705") ?></option>
              <option value='<?php echo site_url("team/roles") ?>'><?php echo lang("ctn_706") ?></option>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($this->settings->info->enable_time && $this->common->has_permissions(array("admin", "project_admin", "time_worker", "time_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("time") ?>'><?php echo lang("ctn_708") ?></option>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "time_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("time/all") ?>'><?php echo lang("ctn_709") ?></option>
            <?php endif; ?>
            <option value='<?php echo site_url("time/stats") ?>'><?php echo lang("ctn_710") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_tickets && $this->common->has_permissions(array("admin", "project_admin", "ticket_worker", "ticket_manage", "ticket_client"), $this->user)) : ?>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "ticket_manage", "ticket_worker"), $this->user)) : ?>
              <option value='<?php echo site_url("tickets") ?>'><?php echo lang("ctn_711") ?></option>
              <option value='<?php echo site_url("tickets/your") ?>'><?php echo lang("ctn_712") ?></option>
            <?php endif; ?>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "ticket_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("tickets/departments") ?>'><?php echo lang("ctn_713") ?></option>
              <option value='<?php echo site_url("tickets/custom_fields") ?>'><?php echo lang("ctn_714") ?></option>
            <?php endif; ?>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "ticket_manage", "ticket_client"), $this->user)) : ?>
              <option value='<?php echo site_url("tickets/client") ?>'><?php echo lang("ctn_715") ?></option>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($this->settings->info->enable_finance && $this->common->has_permissions(array("admin", "project_admin", "finance_worker", "finance_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("finance") ?>'><?php echo lang("ctn_717") ?></option>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "finance_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("finance/all") ?>'><?php echo lang("ctn_718") ?></option>
              <option value='<?php echo site_url("finance/categories") ?>'><?php echo lang("ctn_719") ?></option>
            <?php endif; ?>
          <?php endif; ?>
          <?php if($this->settings->info->enable_invoices && $this->common->has_permissions(array("admin", "project_admin", "invoice_manage", "invoice_client"), $this->user)) : ?>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "invoice_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("invoices") ?>'><?php echo lang("ctn_721") ?></option>
              <option value='<?php echo site_url("invoices/reoccuring") ?>'><?php echo lang("ctn_722") ?></option>
              <option value='<?php echo site_url("invoices/templates") ?>'><?php echo lang("ctn_723") ?></option>
            <?php endif; ?>
            <option value='<?php echo site_url("invoices/client") ?>'><?php echo lang("ctn_724") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_notes && $this->common->has_permissions(array("admin", "project_admin", "notes_manage", "notes_worker"), $this->user)) : ?>
            <?php if($this->common->has_permissions(array("admin", "project_admin", "notes_manage"), $this->user)) : ?>
              <option value='<?php echo site_url("notes") ?>'><?php echo lang("ctn_726") ?></option>
            <?php endif; ?>
            <option value='<?php echo site_url("notes/your") ?>'><?php echo lang("ctn_727") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_services && $this->common->has_permissions(array("admin", "project_admin", "services_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("services") ?>'><?php echo lang("ctn_1215") ?></option>
            <option value='<?php echo site_url("services/orders") ?>'><?php echo lang("ctn_1216") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_quotes && $this->common->has_permissions(array("admin", "project_admin", "quote_manage"), $this->user)) : ?>
            <option value='<?php echo site_url("quotes") ?>'><?php echo lang("ctn_728") ?></option>
            <option value='<?php echo site_url("quotes/forms") ?>'><?php echo lang("ctn_729") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->enable_reports && $this->common->has_permissions(array("admin", "project_admin", "report_manage", "reports_worker"), $this->user)) : ?>
            <option value='<?php echo site_url("reports") ?>'><?php echo lang("ctn_1146") ?></option>
            <option value='<?php echo site_url("reports/time") ?>'><?php echo lang("ctn_1147") ?></option>
            <option value='<?php echo site_url("reports/finance") ?>'><?php echo lang("ctn_1148") ?></option>
            <option value='<?php echo site_url("reports/invoices") ?>'><?php echo lang("ctn_1149") ?></option>
          <?php endif; ?>
          <?php if($this->settings->info->payment_enabled) : ?>
          <option value='<?php echo site_url("funds") ?>'><?php echo lang("ctn_245") ?></option>
          <option value='<?php echo site_url("funds/plans") ?>'><?php echo lang("ctn_273") ?></option>
          <?php endif; ?>
          </select> 
        </div>

        <?php if($this->settings->info->install) : ?>
          <div class="row">
                        <div class="col-md-12">
                                <div class="alert alert-info"><b>NOTICE</b> - <a href="<?php echo site_url("install") ?>">Great job on uploading all the files and setting up the site correctly! Let's now create the Admin account and set the default settings. Click here! This message will disappear once you have run the install process.</a></div>
                        </div>
                    </div>
        <?php endif; ?>
      <?php $gl = $this->session->flashdata('globalmsg'); ?>
        <?php if(!empty($gl)) :?>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="alert alert-success"><b><span class="glyphicon glyphicon-ok"></span></b> <?php echo $this->session->flashdata('globalmsg') ?></div>
                        </div>
                    </div>
        <?php endif; ?>

        <?php echo $content ?>

    </div>
    <div id="footer" class="clearfix">
      <span class="pull-left"><?php echo lang("ctn_170") ?> Camillo und Jan <?php echo $this->settings->info->site_name ?> V<?php echo $this->settings->version ?></span> <span class="pull-right"><a href="<?php echo site_url("home/change_language") ?>"><?php echo lang("ctn_171") ?></a></span>
    </div>

    <!-- SCRIPTS -->
    <script src="<?php echo base_url();?>scripts/custom/global.js"></script>
    <script src="<?php echo base_url();?>scripts/libraries/jquery.nicescroll.min.js"></script>
    <script type="text/javascript">
      $.widget.bridge('uitooltip', $.ui.tooltip);
    </script>
    
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>

     <script type="text/javascript">
            $(document).ready(function() {
              $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    <script type="text/javascript">
     $(document).ready(function() {
        // Get sidebar height
        $('.datepicker').datepicker({dateFormat: '<?php echo $this->common->date_php_to_jquery($this->settings->info->date_picker_format) ?>'});
        var sb_h = $('.sidebar').height();
        var mc_h = $('#main-content').height();
        if(sb_h > mc_h) {
          $('#main-content').css("min-height", sb_h+50 + "px");
        }

        $('.nav-sidebar li').on('shown.bs.collapse', function () {
           $(this).find(".glyphicon-menu-right")
                 .removeClass("glyphicon-menu-right")
                 .addClass("glyphicon-menu-down");
            resize_layout();
        });
        $('.nav-sidebar li').on('hidden.bs.collapse', function () {
           $(this).find(".glyphicon-menu-down")
                 .removeClass("glyphicon-menu-down")
                 .addClass("glyphicon-menu-right");
            resize_layout();
        });

        function resize_layout() 
        {
          var sb_h = $('.sidebar').height();
          var mc_h = $('#main-content').height();
          if(sb_h > mc_h) {
            $('#main-content').css("min-height", sb_h+50 + "px");
          }
        }
     });
    </script>
    </body>
</html>