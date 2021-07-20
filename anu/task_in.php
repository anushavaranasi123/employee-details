<html>
 <head>
  <title>table</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  <style>
  .glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: blue;
}
  h1{
     margin-top: 10rem;
     color: #006699;
     font-family: forte;
     font-size: 5rem;
     margin-left: 15rem;
  }
  /*.box{
    border: 1px solid #34ebea;
    margin-top: -30rem;
    height: 50rem;
    border-radius: ;

    
  }
.box1{
    border: 1px solid #34ebea;
    height: 6rem;
    margin-right: 65rem;
    background: #34ebea;
  }
  .box2{
    border: 1px solid #34ebea;
    height: 30rem;
    margin-right: 98.1rem;
    background: #34ebea;
  }
  .box3{
    border: 1px solid #34ebea;
    height: 6.5rem;
    margin-left: 68.1rem;
    background:#34ebea ;
    margin-top: 0rem;
  }
  .box4{
    border: 1px solid #34ebea;
    height: 30rem;
    margin-left: 98.2rem;
    margin-top: -30rem;
    background: #34ebea;
  }*/
  .panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
}
.panel-default {
    border-color: #ddd;
    width: 90%;
    margin-left:5rem ;
}
body{
   background: linear-gradient(to top left, #669999 0%, #ccffff 100%);
}


  @media(max-width: 1382px){

    /*.box{
       width: 58rem;
       margin-left: 28rem;
    }*/
  }
</style>
 </head>
 <body>
  <div class="box1"></div>
  <div class="box2"></div>
  <div class="container">
  
  <div class="box">
   <h1 align="10rem" >Employee Details</h1>
   <br>
   <br>
   <div class="panel panel-default">
    <div class="panel-heading"> Details</div>
    <div class="panel-body">
     <div class="table-responsive">
     
      <table id="sample_data" class="table table-bordered table-striped  anu">
       <thead>
        <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Address</th>
         <th>salary</th>
        </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="box4"></div>
 <div class="box3"></div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#sample_data').DataTable({
  "processing" : true,
  "searching": false,"paging": false, "info": false,"ordering":false,
  "serverSide" : true,
 
  "ajax" : {
   url:"fetch.php",
   type:"POST"
  }

 });

 $('#sample_data').on('draw.dt', function(){
  $('#sample_data').Tabledit({
   url:'action.php',
   dataType:'json',
   columns:{
    identifier : [0, 'id'],
    editable:[[1, 'Name'], [2, 'Address'], [3, 'salary', ]]
   },
  // restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {

     $('#' + data.id).remove();
     //$('#sample_data').DataTable().ajax.reload();
     $( ".anu" ).each(function( index ) {
     console.log( index +"--" );
});
    }
   }
  });
 });
  
}); 
</script>

