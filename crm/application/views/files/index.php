<div class="white-area-content">

<div class="db-header clearfix">
    <div class="page-header-title"> <span class="glyphicon glyphicon-file"></span> <?php echo lang("ctn_463") ?></div>
    <div class="db-header-extra form-inline"> 
      <div class="btn-group">
    <div class="dropdown">
  <button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    <?php echo lang("ctn_448") ?>
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
      <li><a href="<?php echo site_url("files/" . $page) ?>"><?php echo lang("ctn_449") ?></a></li>
      <li><a href="<?php echo site_url("files/" . $page . "/0/0") ?>"><?php echo lang("ctn_483") ?></a></li>
    <?php foreach($projects->result() as $r) : ?>
      <li><a href="<?php echo site_url("files/".$page."/0/" . $r->ID) ?>"><?php echo $r->name ?></a></li>
    <?php endforeach; ?>
  </ul>
</div>
</div>

    <div class="form-group has-feedback no-margin">
<div class="input-group">
<input type="text" class="form-control input-sm" placeholder="Search ..." id="form-search-input" />
<div class="input-group-btn">
    <input type="hidden" id="search_type" value="0">
        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
        <ul class="dropdown-menu small-text" style="min-width: 90px !important; left: -90px;">
          <li><a href="#" onclick="change_search(0)"><span class="glyphicon glyphicon-ok" id="search-like"></span> <?php echo lang("ctn_355") ?></a></li>
          <li><a href="#" onclick="change_search(1)"><span class="glyphicon glyphicon-ok no-display" id="search-exact"></span> <?php echo lang("ctn_356") ?></a></li>
          <li><a href="#" onclick="change_search(2)"><span class="glyphicon glyphicon-ok no-display" id="name-exact"></span> <?php echo lang("ctn_484") ?></a></li>
          <li><a href="#" onclick="change_search(3)"><span class="glyphicon glyphicon-ok no-display" id="type-exact"></span> <?php echo lang("ctn_485") ?></a></li>
          <li><a href="#" onclick="change_search(4)"><span class="glyphicon glyphicon-ok no-display" id="user-exact"></span> <?php echo lang("ctn_357") ?></a></li>
        </ul>
      </div><!-- /btn-group -->
</div>
</div>

    <a href="<?php echo site_url("files/add_file/" . $folder_parent) ?>" class="btn btn-primary btn-sm"><?php echo lang("ctn_486") ?></a>
</div>
</div>

<ol class="breadcrumb">
  <?php if(count($folders) == 0) : ?>
  <li class="active"><?php echo lang("ctn_487") ?></li>
<?php else : ?>
	<li><a href="<?php echo site_url("files") ?>"><?php echo lang("ctn_487") ?></a></li>
<?php endif; ?>
  <?php foreach($folders as $folder) : ?>
  	<?php if($folder->ID == $folder_parent) : ?>
  		<li class="active"><?php echo $folder->file_name ?></li>
  	<?php else : ?>
  		<li><a href="<?php echo site_url("files/".$page."/" . $folder->ID) ?>"><?php echo $folder->file_name ?></a></li>
  	<?php endif; ?>
  <?php endforeach; ?>
</ol>


<div class="table-responsive">
<table id="files-table" class="table table-bordered table-hover">
<thead>
<tr class="table-header"><td><?php echo lang("ctn_488") ?></td><td><?php echo lang("ctn_489") ?></td><td><?php echo lang("ctn_490") ?></td><td><?php echo lang("ctn_491") ?></td><td><?php echo lang("ctn_492") ?></td><td><?php echo lang("ctn_52") ?></td></tr>
</thead>
<tbody>
</tbody>
</table>
</div>


</div>

<script type="text/javascript">
$(document).ready(function() {

   var st = $('#search_type').val();
    var table = $('#files-table').DataTable({
        "dom" : "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "processing": false,
        "pagingType" : "full_numbers",
        "pageLength" : 15,
        "serverSide": true,
        "orderMulti": false,
        "order": [
          [0, "asc" ]
        ],
        "columns": [
        null,
        null,
        null,
        null,
        { "orderable": false },
        { "orderable": false }
    ],
        "ajax": {
            url : "<?php echo site_url("files/file_page/" . $page . "/" . $folder_parent . "/" . $projectid ) ?>",
            type : 'GET',
            data : function ( d ) {
                d.search_type = $('#search_type').val();
            }
        },
        "drawCallback": function(settings, json) {
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
    $('#form-search-input').on('keyup change', function () {
    table.search(this.value).draw();
});

} );
function change_search(search) 
    {
      var options = [
        "search-like", 
        "search-exact",
        "name-exact",
        "type-exact",
        "user-exact"
      ];
      set_search_icon(options[search], options);
        $('#search_type').val(search);
        $( "#form-search-input" ).trigger( "change" );
    }

function set_search_icon(icon, options) 
    {
      for(var i = 0; i<options.length;i++) {
        if(options[i] == icon) {
          $('#' + icon).fadeIn(10);
        } else {
          $('#' + options[i]).fadeOut(10);
        }
      }
    }
</script>
