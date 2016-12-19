var tableX='';

function refreshRepos() {
    if (confirm("Are you sure you want to refresh the Repo Details?")==true) {
      $(".navbar-collapse").collapse('hide');
      alert('data will reload once refresh has completed');
      $(".page-header").html('<br/><div class="progress"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>');
        $.ajax({url: "server/refreshrepos.php", success: function(result){
            $(".page-header").html("<br/><h1 class='visible-lg'>Popular PHP Repositories on Github</h1>");
            obj=jQuery.parseJSON(result); alert(obj.message);
             tableX=loadDataTable();
            }
        });
        }
}

function showDetail(d) {
    $("#modname").html(d.name + "&nbsp;<small>["+ d.repositoryid + "]</small>" );
    $("#moddesc").html(d.description);
    $("#modstars").html("<strong>Stars:&nbsp;</strong>" + d.stars.toLocaleString());
    $("#modcreate").html("<strong>Creation Date:&nbsp;</strong>" + d.createdate);
    $("#modpush").html("<strong>Last Push Date:&nbsp;</strong>" + d.pushdate);
    $("#modurl").html("<strong><a href='" + d.url + "' target='_blank'>Visit on Github</a></strong>");
    $('#repoModal').modal('show');
}

function loadDataTable() {
           try {tableX.destroy();} catch (err) {}
           return $('#repotable').DataTable({
           "dom": '<fi<t>p>',
            "ajax": "server/getrepos.php",
            "columns": [
              { "data": "repositoryid" },
              { "data": "name" },
              { "data": "url", "render": function ( data, type, full, meta ) {
                return '<a href="'+data+'" target="_blank">' + data + '</a>';
               }},
              { "data": "description" },
              { "data": "stars" },
              {
                  "className":'details-control',
                  "orderable":false,
                  "data":null,
                  "defaultContent": '<button type="button" class="btn btn-xs btn-primary">Detail</button>'
              }            
          ],
          columnDefs: [
            { width: '20%', targets: 2 },
            { width: '30%', targets: 3 },
            { width: '10%', targets: 4 },
            { className: "visible-lg", targets: [2,3] }
            
          ],
          order: [[5, 'desc']],
          lengthChange: false,  
          pageLength: 10,
          pagingType: "full_numbers"
        });
    
    
}